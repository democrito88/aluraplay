<?php

namespace Alura\Mvc\Controller;

interface InterfaceController
{
    public function index();
    public function show(array $parametros);
    public function create();
    public function store();
    public function edit(array $parametros);
    public function update();
    public function delete(array $parametros);
}