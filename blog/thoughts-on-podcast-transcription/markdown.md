---
title: Turning Podcasts into Text: A Weekend Project with Open-Source Tools
description: Build a lightweight, self-hosted podcast transcription tool in a weekend using ffmpeg, Whisper/faster-whisper, and a tiny FastAPI backend—what matters, pitfalls to avoid, and how to iterate.
author: tweakch
published: 2025-09-24
tags: [python, whisper, transcription, fastapi, ffmpeg]
featured: true
keywords: [podcast transcription, faster-whisper, whisper.cpp, ffmpeg, fastapi]
---

<!-- Title comes from front matter -->

I love the long-form conversations that podcasts offer. But I don’t always have the time—or the patience—to scrub through hours of audio when I just want to revisit a single quote, search a topic, or grab a reference. That itch became the seed for a lightweight, self-hosted transcription tool: something I could build in a weekend, showcase on my website, and maybe extend later.

What follows is the thought process behind such a project: what it takes, what open-source tech to lean on, and where the fun opportunities lie.

---

## Why Bother Transcribing?

Transcripts turn podcasts into searchable, skimmable text. That enables:

* **Fast navigation**: Jump straight to the part where a guest drops an insight.
* **Accessibility**: People who prefer reading—or who can’t listen—can still enjoy the content.
* **Derivatives**: Summaries, blog posts, or even SEO-friendly archives.

Commercial services exist, but building your own means privacy, customization, and the nerdy satisfaction of running the whole pipeline yourself. You also control cost and can tinker with accuracy/speed trade-offs.

---

## The Core Idea

At its simplest, the system needs to:

1. Take an audio file (e.g., an MP3 from a podcast feed).
2. Normalize and chunk the audio into digestible slices.
3. Run those slices through an open-source speech-to-text model.
4. Stitch the results back together into a clean transcript.
5. Display the transcript in a way that’s easy to explore.

Everything else—speaker diarization, keyword extraction, summaries—can come later.

---

## The Tech Stack

For a weekend build, “boring and proven” beats over‑engineering. Here’s a pragmatic stack:

* **Audio handling**: `ffmpeg` for format conversion.
* **Transcription engine**: [Whisper](https://github.com/openai/whisper) or one of its optimized forks:

  * [`faster-whisper`](https://github.com/SYSTRAN/faster-whisper) → GPU/CPU friendly Python wrapper.
  * [`whisper.cpp`](https://github.com/ggerganov/whisper.cpp) → bare-metal C++ that runs even on small machines.
* **Backend**: Python with [FastAPI](https://fastapi.tiangolo.com/) for a simple REST endpoint.
* **Storage**: JSON files or SQLite for transcripts.
* **Frontend**: Minimal HTML/JS page with an audio player and text search. Libraries like [wavesurfer.js](https://wavesurfer-js.org/) can even sync transcript text with playback.

This stack is small enough to run on a laptop or cheap VPS, yet flexible enough to grow. As a rule of thumb: start with `base` or `small` model sizes for speed; upgrade if accuracy is lacking.

---

## The “Forgotten” Pieces

When sketching a system like this, a few details often slip through the cracks (and cause headaches later):

* **Chunking**: Models perform better on smaller segments than on one massive file.
* **Timestamps**: If you want transcripts to link back to audio, alignment matters.
* **Export formats**: SRT/VTT subtitles are almost free to generate and very useful. Having timestamps early makes this trivial.
* **Legal grey areas**: Transcribing podcasts for personal use is fine, but publishing transcripts of copyrighted shows is another story.

Pitfalls to watch for:

* Overly long segments degrade accuracy; chunk around natural pauses (VAD helps).
* Low‑bitrate stereo can confuse models; convert to mono 16kHz.
* Aggressive noise gates can clip words—prefer light denoise to preserve speech.

---

## Building in a Weekend

A minimal scope for the first version:

1. Upload MP3.
2. Convert with `ffmpeg`.
3. Transcribe with `faster-whisper`.
4. Return JSON transcript.
5. Render as static HTML.

That’s it. A backend route, one CLI call, and a simple page. Enough to feature on a personal site and start experimenting.

Concrete, minimal flow:

```bash
# Normalize to 16kHz mono WAV (robust model input)
ffmpeg -i input.mp3 -ac 1 -ar 16000 -y input.wav
```

```python
# Transcribe with faster-whisper (Python)
from faster_whisper import WhisperModel

model = WhisperModel("base", device="auto")  # start small; upgrade if needed
segments, info = model.transcribe("input.wav", vad_filter=True)

transcript = [{"start": s.start, "end": s.end, "text": s.text.strip()} for s in segments]
print({"language": info.language, "segments": transcript})
```

```python
# Minimal FastAPI endpoint
from fastapi import FastAPI, UploadFile
import subprocess, tempfile
from faster_whisper import WhisperModel

app = FastAPI()
model = WhisperModel("base", device="auto")

@app.post("/transcribe")
async def transcribe(file: UploadFile):
  with tempfile.NamedTemporaryFile(suffix=".mp3") as mp3, tempfile.NamedTemporaryFile(suffix=".wav") as wav:
    mp3.write(await file.read()); mp3.flush()
    subprocess.run(["ffmpeg", "-i", mp3.name, "-ac", "1", "-ar", "16000", "-y", wav.name], check=True)
    segments, info = model.transcribe(wav.name, vad_filter=True)
    data = [{"start": s.start, "end": s.end, "text": s.text.strip()} for s in segments]
    return {"language": info.language, "segments": data}
```

---

## What Comes Next

Once the basics work, there are lots of optional extensions:

* **Speaker diarization** with [pyannote.audio](https://github.com/pyannote/pyannote-audio).
* **Summaries and chapters** using Hugging Face transformers.
* **Search across multiple episodes** via SQLite FTS (simple) or a vector database (semantic search).
* **Browser-based transcription** with Whisper compiled to WebAssembly.

But the point of a weekend project isn’t to build everything. It’s to carve out a narrow slice, get it running, and learn where the interesting friction lies.

---

## Final Thoughts

For me, this project is less about perfect transcripts and more about exploring the boundary where open-source AI models meet everyday use cases. A podcast transcription tool won’t change the world, but it scratches a personal itch, highlights the power of today’s models, and leaves plenty of room to iterate later.

If nothing else, it’ll let me search for that quote I half-remembered without scrolling through two hours of small talk.
