<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('fecha', function () {
    return date('d m y h:i:s');
});

Route::get('saludo/{nombre?}/{id?}', function ($nombre = 'Anonimo', $id = 0) {
    return "hola $nombre con id $id";
})->name('hacersaludo')
    ->where('nombre', '[A-Za-z]+');
//nombre para llamar a esta ruta desde cuanlquier sitio


Route::get('inicio2/{usuario?}', function ($usuario = 'nadie') {

    $empresas = [
        [
            "nombre" => "TechNova Solutions",
            "sector" => "Tecnología",
            "ubicacion" => "San Francisco, CA",
            "empleados" => 250,
            "fundada" => 2015
        ],
        [
            "nombre" => "EcoGrow Ventures",
            "sector" => "Energía renovable",
            "ubicacion" => "Madrid, España",
            "empleados" => 80,
            "fundada" => 2020
        ],
        [
            "nombre" => "Skyline Architects",
            "sector" => "Arquitectura",
            "ubicacion" => "Toronto, Canadá",
            "empleados" => 120,
            "fundada" => 2008
        ],
        [
            "nombre" => "FreshBite Foods",
            "sector" => "Alimentación",
            "ubicacion" => "Ciudad de México, México",
            "empleados" => 500,
            "fundada" => 1998
        ],
        [
            "nombre" => "AquaTech Marine",
            "sector" => "Industria marina",
            "ubicacion" => "Sídney, Australia",
            "empleados" => 300,
            "fundada" => 2010
        ]
    ];
    return view('inicio2', compact('empresas'));
});


Route::get('inicio', function(){

    return view('inicio');
})
->name('inicio');

Route::get('empresas', function(){
    $empresas = [
        1 => [
            "id" => 1,
            "nombre" => "TechInnovate",
            "descripcion" => "Empresa especializada en soluciones web personalizadas, incluyendo aplicaciones web, diseño UX/UI y desarrollo full-stack."
        ],
        2 => [
            "id" => 2,
            "nombre" => "WebCraft Studio",
            "descripcion" => "Ofrecen servicios de desarrollo web enfocados en comercio electrónico y sitios dinámicos con tecnologías modernas como React y Node.js."
        ],
        3 => [
            "id" => 3,
            "nombre" => "PixelPerfect",
            "descripcion" => "Agencia de diseño y desarrollo que se centra en crear sitios web visualmente impactantes y optimizados para dispositivos móviles."
        ],
        4 => [
            "id" => 4,
            "nombre" => "CodeTrail",
            "descripcion" => "Desarrolladores expertos en plataformas web escalables y servicios backend robustos para startups y grandes empresas."
        ],
        5 => [
            "id" => 5,
            "nombre" => "NextLevel Web",
            "descripcion" => "Agencia especializada en desarrollo de sitios web de alto rendimiento, integraciones API y aplicaciones empresariales."
        ],
        6 => [
            "id" => 6,
            "nombre" => "DigitalHive",
            "descripcion" => "Ofrecen soluciones digitales completas, desde diseño web hasta optimización SEO y desarrollo de aplicaciones móviles."
        ]
        ];

    return view('empresas', compact('empresas'));
})
->name('empresas');

Route::get('empresa/{id}', function($id){

    $empresas = [
        1 => [
            "id" => 1,
            "nombre" => "TechInnovate",
            "descripcion" => "Empresa especializada en soluciones web personalizadas, incluyendo aplicaciones web, diseño UX/UI y desarrollo full-stack.",
            "cif" => "B12345678",
            "direccion" => "Calle Innovación, 123, Madrid, España"
        ],
        2 => [
            "id" => 2,
            "nombre" => "WebCraft Studio",
            "descripcion" => "Ofrecen servicios de desarrollo web enfocados en comercio electrónico y sitios dinámicos con tecnologías modernas como React y Node.js.",
            "cif" => "B23456789",
            "direccion" => "Avenida Creativa, 456, Barcelona, España"
        ],
        3 => [
            "id" => 3,
            "nombre" => "PixelPerfect",
            "descripcion" => "Agencia de diseño y desarrollo que se centra en crear sitios web visualmente impactantes y optimizados para dispositivos móviles.",
            "cif" => "B34567890",
            "direccion" => "Plaza Diseño, 789, Valencia, España"
        ],
        4 => [
            "id" => 4,
            "nombre" => "CodeTrail",
            "descripcion" => "Desarrolladores expertos en plataformas web escalables y servicios backend robustos para startups y grandes empresas.",
            "cif" => "B45678901",
            "direccion" => "Calle Backend, 101, Sevilla, España"
        ],
        5 => [
            "id" => 5,
            "nombre" => "NextLevel Web",
            "descripcion" => "Agencia especializada en desarrollo de sitios web de alto rendimiento, integraciones API y aplicaciones empresariales.",
            "cif" => "B56789012",
            "direccion" => "Avenida Rendimiento, 202, Zaragoza, España"
        ],
        6 => [
            "id" => 6,
            "nombre" => "DigitalHive",
            "descripcion" => "Ofrecen soluciones digitales completas, desde diseño web hasta optimización SEO y desarrollo de aplicaciones móviles.",
            "cif" => "B67890123",
            "direccion" => "Calle Digital, 303, Bilbao, España"
        ]
    ];

    $empresa = $empresas[$id];

    return view('empresa', compact('empresa'));

})->name('info_empresa');


