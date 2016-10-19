<?php
/**
 * Created by PhpStorm.
 * User: fethe
 * Date: 18/10/16
 * Time: 21:44
 */


// Home
Breadcrumbs::register('inicio', function($breadcrumbs)
{
    $breadcrumbs->push('Lorem Estudio', route('inicio'));
});

Breadcrumbs::register('clientes', function($breadcrumbs)
{
    $breadcrumbs->parent('inicio');
    $breadcrumbs->push('Clientes', route('clientes'));
});

// Home > About
Breadcrumbs::register('cliente', function($breadcrumbs, $cliente)
{
    $breadcrumbs->parent('clientes');
    $breadcrumbs->push($cliente->nombre.' '.$cliente->apellido, route('cliente', [$id = $cliente->slug]));
});

// Home > Blog


// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});
