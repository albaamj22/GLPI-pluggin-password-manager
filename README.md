# Password Manager — GLPI Plugin

A GLPI plugin that adds a shortcut in the administration menu to an external password manager (such as Bitwarden, KeePass Web, etc.). When the user clicks the menu entry, GLPI automatically opens the manager in a new browser tab.

## Requirements

| Requirement | Version |
|-------------|---------|
| GLPI | 10.0 — 12.0 |
| PHP | Whatever your GLPI version requires |

## Installation

1. Copy the `gestorcontrasenas` folder into the `plugins/` directory of your GLPI installation:
   ```
   glpi/
   └── plugins/
       └── gestorcontrasenas/
   ```
2. Log in to GLPI as an administrator.
3. Go to **Setup > Plugins**.
4. Locate **Password Manager** and click **Install**, then **Enable**.

## Configuration

Before using the plugin you need to set the URL of your password manager. Edit the following two files and replace `yourLink` with the actual URL:

| File | Line to change |
|------|----------------|
| `front/redirect.php` | `<a id="l" href="yourLink" ...>` |
| `front/newtab.php` (and `front/newtab.js`) | `a.href = 'yourLink';` |

Example with a self-hosted Bitwarden:
```php
// redirect.php
<a id="l" href="https://bitwarden.mycompany.com" target="_blank" rel="noopener noreferrer"></a>

// newtab.php / newtab.js
a.href = 'https://bitwarden.mycompany.com';
```

## How it works

```
User clicks
"Password Manager"
        │
        ▼
  redirect.php         ← checks that the user has an active GLPI session
        │
        ▼
  Opens the external   ← new browser tab
  manager URL
        │
        ▼
  Returns to the       ← history.back() after 100 ms
  previous GLPI page
```

Additionally, the `newtab.js` script is injected into every GLPI page and converts any internal link to the plugin into an external link that opens in a new tab, preventing the manager from loading inside the GLPI frame.

## Permissions

The menu entry is only visible to users who have the **Setup > Read** right (`config READ`). Users without that permission will not see the entry in the menu.

## Plugin structure

```
gestorcontrasenas/
├── setup.php                  # Plugin registration: version, hooks, menu
├── inc/
│   └── menu.class.php         # Class that defines the administration menu entry
└── front/
    ├── redirect.php            # Intermediate page that redirects to the external manager
    ├── newtab.php              # Serves the JS as application/javascript
    └── newtab.js               # Script that patches plugin links in the DOM
```

## Author and license

- **Author:** Alba Martín
- **Version:** 1.0.0
- **License:** GPLv2+
