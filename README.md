# Livewire Flux Project

A modern Laravel application built with Livewire and Flux UI components.

## 🛠 Tech Stack

- **Laravel** - PHP web framework
- **Livewire** - Full-stack framework for dynamic Laravel applications
- **Flux UI** - Modern UI component library
- **TailwindCSS** - Utility-first CSS framework
- **Alpine.js** - Minimal JavaScript framework
- **SweetAlert2** - Beautiful, responsive, customizable alert library

## 📁 Project Structure

```
livewire_flux/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Livewire/
│   └── Models/
├── resources/
│   ├── views/
│   │   ├── components/
│   │   └── livewire/
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
├── config/
└── database/
    └── migrations/
```

Each directory serves a specific purpose:

- `app/Http/Livewire/` - Contains Livewire component classes
- `app/Models/` - Database models
- `resources/views/livewire/` - Livewire component views
- `resources/views/components/` - Reusable Blade components
- `resources/css/` - Tailwind CSS and custom styles
- `resources/js/` - Alpine.js and other JavaScript files

## 📊 Implementation Comparison

This project includes a detailed comparison between traditional Laravel Blade and Livewire approaches for handling blog posts. The comparison covers routing, controller structure, view implementation, and key architectural differences.

[View the full comparison](COMPARE.md)

