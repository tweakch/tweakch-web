# Portfolio Content Contribution Guidelines

These guidelines define the structure, style, and acceptance criteria for adding new portfolio project entries under `portfolio/<project-slug>/markdown.md`.

---

## 1. Directory & File Naming

- Each project lives in its own folder: `portfolio/<kebab-case-slug>/`.
- Exactly one content file named `markdown.md` per project directory.
- Slug should be stable, lowercase, URL-safe; avoid dates or versions in slug.

---

## 2. Front Matter (Required)

Minimal flat key:value schema (no nesting). Allowed keys below. Arrays may use bracket form `[a, b, c]` or a comma string.

```yaml
---
title: <Human readable title>
description: <~140 char concise summary>
client: <Client / Organization / Internal>
role: <Primary role(s)>
tech: [TechOne, TechTwo, TechThree]
tags: [tag-one, tag-two, tag-three]
published: YYYY-MM-DD
---
```

Optional (when relevant):

- `status:` (e.g., active, archived, in-progress)
- `repository:` (public URL)
- `website:` (live URL)
- `license:` (if open source specific)

Constraints:

- `title` <= 80 chars.
- `description` 90–160 chars (will surface in previews / meta).
- `published` must be ISO date (UTC) and not in the future (except drafts – see Drafts below).

---

## 3. Content Structure

After front matter, use the following recommended ordered sections. Omit those not applicable (do not leave empty headings):

1. `# Overview` (or single H1 if not using a separate title block—prefer starting with `## Overview` since site title already renders)
2. `## Problem / Context`
3. `## Objectives` (bulleted, outcome-focused)
4. `## Architecture / Approach` or `## Implementation` (choose one)
5. `## Key Contributions` (bulleted; each line begins with a strong verb)
6. `## Challenges & Resolutions`
7. `## Impact / Results` (quantitative where possible; tables allowed)
8. `## Tooling / Stack Details` (optional if not covered in approach)
9. `## Lessons Learned` (optional)
10. `## Roadmap / Next Steps` (optional)
11. `## Links` (if external resources)

Additional section types (case-by-case):

- `## Performance Improvements`
- `## Security & Compliance`
- `## Developer Experience Enhancements`
- `## Testing & Quality`

Do NOT introduce a second table of contents—layout already generates sidebar/inline TOC from headings.

---

## 4. Writing Style

- Use active voice: "Reduced build time by 35%", not "Build time was reduced".
- Prefer present or past tense consistently within a section.
- Start bullet lines with a bolded action word when emphasizing impact (e.g., **Optimized**, **Automated**, **Reduced**).
- Avoid marketing fluff; be specific & measurable.
- Wrap lines at ~120 chars for diff readability (not enforced strictly).
- Use fenced code blocks with language identifiers (e.g., `bash`, `php`, `js`) where sample snippets add value.
- Keep tables lean (<= 6 columns). Split if wider.

---

## 5. Formatting Conventions

- Single top-level H1 (site may already inject a visual title—prefer using `##` for primary sections after front matter).
- Blank line before and after each heading and list (Markdown linter friendly).
- Use kebab-case for tags and tech tokens where multi-word (e.g., `performance-tuning`).
- Lists: prefer `-` over `*` for consistency.

---

## 6. Images (Future Provisioning)

(Current implementation has no image handling inside portfolio markdown beyond raw HTML.) When enabled:

- Store images under `portfolio/<slug>/images/`.
- Reference relatively: `![Alt text](images/diagram.png)`.
- Use compressed `.webp` where possible.

---

## 7. Drafts

If a project is not yet public:

- Add `status: draft` in front matter.
- Avoid confidential client names; use generic placeholders until cleared.
- Drafts may have a future `published` date (they will be filtered/flagged if logic is added later).

---

## 8. Acceptance Criteria Checklist

A submission is considered merge-ready when:

- [ ] Folder name matches intended slug & contains only `markdown.md` (plus optional future assets/images).
- [ ] Front matter includes required keys & valid date.
- [ ] Description length within bounds.
- [ ] No prohibited nested front matter structures.
- [ ] Headings follow hierarchy (no jumps > 1 level; starts at H2 after title).
- [ ] No duplicate H1 headings.
- [ ] Lists & headings have proper blank line padding.
- [ ] No raw HTML for disallowed tags (`script`, `iframe`, `object`, `form`).
- [ ] Code blocks (if present) specify language.
- [ ] Metrics & outcomes (if claimed) are plausible & attributable.

---

## 9. Rejection Examples

A submission will be rejected if it:

- Contains marketing superlatives without evidence ("world-class", "unparalleled").
- Omits required front matter keys.
- Uses nested YAML or complex structures (parser is intentionally simple).
- Adds a second TOC or manual anchor duplication.
- Includes sensitive credentials, tokens, or internal hostnames.

---

## 10. Review Process (Suggested)

1. Automated lint (future): front matter keys + markdown spacing.
2. Human review focusing on clarity, specificity, measurable outcomes.
3. Optional style pass to align verb tone & consistency.

---

## 11. Examples

See existing entries for tone & scope:

- `portfolio/designcraft/markdown.md`
- `portfolio/blockfrost-dotnet/markdown.md`
- `portfolio/cardano-developer-portal/markdown.md`

---

## 12. Future Enhancements (Non-Binding)

- Add CI script to validate front matter schema.
- Generate tag index & related projects section automatically.
- Add image optimization pipeline.
- Introduce `duration:` and `team_size:` optional keys.

---
Questions or improvements? Open a PR refining this guideline.
