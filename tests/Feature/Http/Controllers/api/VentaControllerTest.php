<?php

namespace Tests\Feature\Http\Controllers\api;

use Tests\TestCase;
use App\Models\Venta;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VentaControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_venta_index()
    {
        $this->withoutExceptionHandling();

        Venta::factory()->create();
        $response=$this->get('/api/venta');
        $response->assertOk();

        $venta=Venta::all();
       
        $response->assertJson([
            'data'=> [
                [
                    'data'=>[
                        'type'=>'venta',
                        
                        'attributes'=>[
                            'numero_factura'=>$venta->first()->numero_factura,
                            'cliente'=>$venta->first()->cliente,
                            'telefono'=>$venta->first()->telefono,
                            'email'=>$venta->first()->email,
                        ]
                    ]
                                ]
                            ],

        ]);
    }

    public function test_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson('/api/venta',[
            'numero_factura'=>'123',
            'cliente'=>'juan',
            'telefono'=>'123',
            'email'=>'oscar@gmail.com'
        ]);

        $this->assertCount(1, Venta::all());
        $venta = Venta::first();
       


        $this->assertEquals('123',$venta->numero_factura);
        $this->assertEquals('juan',$venta->cliente);
        $this->assertEquals('123',$venta->telefono);
        $this->assertEquals('oscar@gmail.com',$venta->email);

        $response ->assertJson([
            'data'=>[
                'type'=>'venta',
                'venta_id'=>$venta->id,
                'attributes'=>[
                    'numero_factura'=>$venta->numero_factura,
                    'cliente'=>$venta->cliente,
                    'telefono'=>$venta->telefono,
                    'email'=>$venta->email,
                   
                ]
            
                        
                    ],
    
]);
                }

}
