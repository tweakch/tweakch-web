# TWEAK Stake Pool Channel Website

TWEAK SPC is a static HTML5/CSS/JavaScript website for a Cardano blockchain stakepool launchpad. Built on the "Dopetrope" template by HTML5 UP, it uses SASS for CSS compilation and deploys as a static site.

**ALWAYS reference these instructions first and fallback to search or bash commands only when you encounter unexpected information that does not match the info here.**

## Working Effectively

### Bootstrap and Build
- Install modern SASS globally: `npm install -g sass`
- NEVER use `npm install` - node-sass dependency has compatibility issues with Node.js 20+
- Compile SASS: `sass assets/sass/main.scss assets/css/main.css` 
- SASS compilation takes ~1 second. No timeout needed.
- SASS compilation produces deprecation warnings - this is normal and expected.

### Run the Website
- Serve locally: `python3 -m http.server 8000`
- Server startup takes ~2 seconds. No timeout needed.
- Access at: `http://localhost:8000`
- Server runs until manually stopped (Ctrl+C or stop_bash command)
- **NEVER CANCEL**: Keep server running during testing and validation

### Project Structure
```
├── index.html              # Main homepage
├── start.html              # Getting started page  
├── channel/index.html      # Channel-specific homepage
├── assets/
│   ├── css/main.css       # Compiled CSS (generated)
│   ├── sass/main.scss     # Source SASS files
│   └── js/                # JavaScript files
├── images/                # Static images
├── .github/workflows/     # CI/CD pipeline (FTP deployment)
└── package.json           # Node.js metadata (DO NOT USE)
```

## Validation

### Manual Testing Requirements
After making changes, ALWAYS validate by:
1. Recompile SASS if you modified any SASS files: `sass assets/sass/main.scss assets/css/main.css`
2. Start development server: `python3 -m http.server 8000`
3. Open browser to `http://localhost:8000`
4. Test navigation between pages:
   - Click "Get Started" button → should navigate to start.html
   - Navigate to `http://localhost:8000/channel/index.html` → should load channel page
   - All navigation links should work without 404 errors
5. Verify styling and layout are intact
6. Check browser console for JavaScript errors
7. Take screenshot of key pages to document changes

### Build Validation
- SASS compilation must complete without errors (warnings are acceptable)
- Generated `assets/css/main.css` file should be updated with recent timestamp
- All HTML pages should load without 404 errors for CSS/JS resources
- Website should be fully functional in browser testing

### Known Issues and Workarounds
- `npm install` fails due to node-sass compatibility - use global sass instead
- Some external fonts/CDN resources may be blocked - this is expected in testing environments
- Channel directory uses relative paths that may need adjustment for assets

## CI/CD Information
- GitHub Actions workflow deploys via FTP to production server
- Workflow triggers on push to main branch
- No build step in CI - uses committed CSS files
- Always commit compiled CSS changes along with SASS changes

## Common Tasks

### Add New Styles
1. Edit SASS files in `assets/sass/`
2. Recompile: `sass assets/sass/main.scss assets/css/main.css`
3. Test changes with local server
4. Commit both SASS and compiled CSS files

### Add New Pages
1. Create new HTML file based on existing page structure
2. Update navigation links in existing pages
3. Test all navigation paths
4. Verify CSS/JS asset paths are correct

### Debug Styling Issues
1. Check browser developer tools console for errors
2. Verify CSS file is being loaded and is recent
3. Recompile SASS if changes aren't reflected
4. Clear browser cache if needed

## Repository Reference

### Key Files (avoid modifying unless necessary)
- `README.txt` - Original template documentation
- `package.json` - Contains broken node-sass dependency
- `.github/workflows/main.yml` - FTP deployment configuration
- `assets/js/` - jQuery and template JavaScript files

### SASS Color Variables
```scss
$color-connect: #d11141;    // Red
$color-educate: #00b159;    // Green  
$color-build: #00aedb;      // Blue
$color-promote: #ffc425;    // Yellow
$color-teal: #00aba9;       // Teal accent
```

### Navigation Structure
- Main sections: POOLS, TEAMS, ABOUT
- Secondary pages: Start, Mission, FAQ, Whitepaper
- Channel section has duplicate structure with different content