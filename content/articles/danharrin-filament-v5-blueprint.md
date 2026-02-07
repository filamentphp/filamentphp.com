---
title: "Introducing Filament v5 and Filament Blueprint"
slug: danharrin-filament-v5-blueprint
author_slug: danharrin
publish_date: 2026-01-16
categories: [general]
type_slug: news
---

![Filament v5 Release Banner Image](/images/content/articles/danharrin-filament-v5-blueprint/banner.webp)

We're excited to announce **Filament v5** and **Filament Blueprint**, just a week after our [v4.5 release](https://filamentphp.com/content/danharrin-filament-v4-5).

## Why Filament v5?

Filament v5 integrates [Livewire v4](https://livewire.laravel.com/docs/4.x/upgrading), released this week by Caleb Porzio and the Livewire team. Congratulations to them on this major milestone!

We've bumped to a new major version so that projects not requiring `livewire/livewire` directly won't have custom Livewire code broken unexpectedly. Apart from Livewire v4 support, Filament v5 has no additional changes over v4, and we'll continue pushing features to both versions.

Filament v5 has a brief [upgrade guide](https://filamentphp.com/docs/5.x/upgrade-guide) with no manual steps required. As usual, we have an upgrade script to check for compatibility issues and apply changes automatically. If you have custom Livewire components, also follow the [Livewire upgrade guide](https://livewire.laravel.com/docs/4.x/upgrading).

## Introducing Filament Blueprint

We're also launching **Filament Blueprint**, a tool that helps AI coding agents produce better implementation plans for Filament v4 and v5 projects.

### The problem with AI-generated Filament code

When you ask an AI agent to build something with Filament, you typically get a vague, high-level plan that leaves too much to interpretation. The AI might understand what you want, but it doesn't know _how_ Filament actually works. When an agent starts to implement the plan, it often gets component namespaces wrong, misses important configuration details, or creates layouts that don't make sense.

Filament Blueprint is a premium [Laravel Boost](https://laravel.com/ai/boost) extension that feeds your AI agent comprehensive knowledge about Filament's components, patterns, and best practices. When you ask for an implementation plan, the agent produces a detailed specification that can be implemented directly, with no guessing required.

### An example Blueprint plan

Once Blueprint is installed into Laravel Boost, you can use planning mode to ask your agent to create a "Filament Blueprint" for your feature. For example:

```
Using Filament Blueprint, produce an implementation plan for a Filament v4 application. The application is
a SaaS invoicing system with the following capabilities:

- Manage customers
- Manage products
- Create and edit invoices
- Add line items to invoices
- Send invoices to customers
- Record and track payments

The plan should:
- Describe the primary user flows end to end (for example: creating an invoice,
  sending it, recording a payment).
- Map each domain concept and flow to concrete Filament primitives (Resources,
  Relation Managers, Pages, Actions).
- Identify state transitions (such as draft → sent → paid) and the Actions that
  trigger them.
```

We ran this prompt with and without Blueprint installed:

- **[Before Blueprint](https://filamentphp.com/blueprint/examples/invoicing/before.md)** - A typical AI-generated plan: useful structure, but vague on specifics
- **[After Blueprint](https://filamentphp.com/blueprint/examples/invoicing/after.md)** - The Blueprint-enhanced output: a complete implementation specification

The Blueprint output includes:

- **Exact component references** with documentation links for every form field, table column, and action
- **Agent-friendly CLI commands** to generate files with, instead of requiring an agent to start a file from scratch or guess the right non-interactive command
- **Precise configuration chains** like `->relationship('customer', 'name')->searchable()->preload()->createOptionForm([...])`
- **Reactive field specifications** showing exactly how line item totals and invoice totals should auto-calculate with `->live()` and `afterStateUpdated()`
- **Sensible layout choices** that take into account the number of grid columns in different parts of a page to ensure a good user experience
- **Complete action definitions** with visibility rules, modal forms, and behavior specifications
- **Test case design** covering validation, component configuration, action visibility, and business logic

Instead of spending hours correcting AI hallucinations, you get a specification you can implement directly, or hand off to an AI agent.

### Getting started with Blueprint

Once you've [purchased Blueprint](https://packages.filamentphp.com/portal/blueprint/checkout) and installed it, you can enable planning mode in your AI agent and ask it to create a Filament Blueprint for your feature. You can learn more about Blueprint in our [documentation](https://filamentphp.com/docs/introduction/ai).

## More to come in 2026

We're currently working on a couple of other projects that we hope to share with you in the coming months. Stay tuned!
