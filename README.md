# Webase


Webase is a php robust cocktail of built on top of **CodeIngiter** to help developers 
starting a new project with no worries about the foundation or starting from scratch
with webase you get **HMVC**, **Migrations**, **Authentication** and many more features

## What is HMVC - Modular Extension?

Modular Extensions makes the CodeIgniter PHP framework modular. Modules are groups of independent components, typically model, controller and view, arranged in an application modules sub-directory that can be dropped into other CodeIgniter applications.

HMVC stands for Hierarchical Model View Controller.

Module Controllers can be used as normal Controllers or HMVC Controllers and they can be used as widgets to help you build view partials.

## Why bother with migration?

## Getting started

it is very easy to get a copy of webase and start a new project right away

#### Prerequisites
1. PHP >= 5.8 (Recommended using version 7.3)
2. on local machine use **MAMP** or **XAMP**

#### Installation and running

* Clone the project `git clone https://github.com/lemondropsarl/webase.git`
* Run composer `composer install`
* modify config file `$config['base_url'] = 'path according to your setup'`
* Open in Browser `exemple : http://localhost/webase/`

* Create your module in `application/modules/` folder
your controllers must `extends MX_Controller`

```
<?php
class Xyz extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
    }
}

```
* Start developping your new project

Controllers may be loaded from application/controllers sub-directories.

Controllers may also be loaded from module/controllers sub-directories.

## Featured

* [Material Dashboard](https://demos.creative-tim.com/material-dashboard-dark/docs/2.0/getting-started/introduction.html)

Material Dashboard is a free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design. We are very excited to introduce our take on the material concepts through an easy to use and beautiful set of components. Material Dashboard was built over the popular Bootstrap framework and it comes with a couple of third-party plugins redesigned to fit in with the rest of the elements.

Material Dashboard makes use of light, surface and movement. The general layout resembles sheets of paper following multiple different layers, so that the depth and order is obvious. The navigation stays mainly on the left sidebar and the content is on the right inside the main panel.

This product came as a result of users asking for a material dashboard after we released our successful [Material Kit](https://www.creative-tim.com/product/material-kit). We developed it based on your feedback and it is a powerful bootstrap admin dashboard, which allows you to build products like admin panels, content managements systems and CRMs.







