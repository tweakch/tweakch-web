# tweakch-web Portfolio Website

## Overview
This is Alexander Klee's personal portfolio website showcasing his work as a Senior .NET Engineer and Scrum Master. The site features a clean, modern design built with HTML5, SCSS, and JavaScript.

## Recent Changes (2025-09-17)
- **GitHub Import Setup**: Successfully configured the project for Replit environment
- **Build System Update**: Replaced deprecated `node-sass` with modern `sass` compiler
- **Workflow Configuration**: Set up web server on port 5000 with automatic SCSS compilation
- **Deployment Ready**: Configured for autoscale deployment with build and run commands

## Project Architecture
- **Frontend**: Static HTML5 website using HTML5UP Dopetrope template
- **Styling**: SCSS/Sass compiled to CSS with custom theming
- **JavaScript**: Vanilla JS with jQuery for interactivity
- **Assets**: FontAwesome icons, custom images, and web fonts
- **Build System**: Node.js with Sass compiler
- **Server**: http-server for static file serving

## User Preferences
- Maintain existing design and structure
- Keep build system simple and reliable
- Ensure cross-browser compatibility
- Focus on performance and accessibility

## Technical Setup
- **Node.js Dependencies**: sass, http-server
- **Build Commands**: 
  - `npm run build-css`: Compile SCSS to CSS
  - `npm run watch-css`: Watch and auto-compile SCSS
  - `npm start`: Build CSS and start server
- **Server**: Runs on 0.0.0.0:5000 for Replit compatibility
- **Deployment**: Autoscale target with CSS build step

## Key Features
- Responsive design for all screen sizes
- Professional portfolio showcasing projects and experience
- Contact information and social links
- Clean, modern UI with custom color theming
- FontAwesome icons and custom badges