<?php
/**
 * Created by PhpStorm.
 * User: fethe
 * Date: 18/10/16
 * Time: 21:44
 */


// Inicio
Breadcrumbs::register('inicio', function($breadcrumbs)
{
    $breadcrumbs->push(Config::get('app.name'), route('inicio'));
});

// Inicio > Clientes
Breadcrumbs::register('clientes', function($breadcrumbs)
{
    $breadcrumbs->parent('inicio');
    $breadcrumbs->push('Clientes', route('clientes'));
});

// Inicio > Clientes > Cliente
Breadcrumbs::register('cliente', function($breadcrumbs, $cliente)
{
    $breadcrumbs->parent('clientes');
    $breadcrumbs->push($cliente->nombre.' '.$cliente->apellido, route('cliente', [$slug = $cliente->slug]));
});

// Inicio > Expedientes
Breadcrumbs::register('expedientes', function($breadcrumbs)
{
    $breadcrumbs->parent('inicio');
    $breadcrumbs->push('Expedientes', route('expedientes'));
});

// Inicio > Expedientes > Expediente
Breadcrumbs::register('expediente', function($breadcrumbs, $expediente)
{
    $breadcrumbs->parent('expedientes');
    $breadcrumbs->push($expediente->titulo, route('expediente', [$slug = $expediente->slug]));
});

// Inicio > Agenda
Breadcrumbs::register('agenda', function($breadcrumbs)
{
    $breadcrumbs->parent('inicio');
    $breadcrumbs->push('Agenda', route('agenda'));
});



