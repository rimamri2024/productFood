<?php
   namespace App\Test\Entity;
   use App\Entity\Product;
   use PHPUnit\Framework\TestCase;
   class ProductTest extends TestCase{
    public function testInvalidPrice(){
        $p=new Product('pomme','food',-3);
        $this->expectException('Exception');
        $p->computeTVA();
    }
    public function testDefolt(){
        $product= new Product('pomme','food',1);
        $this-> assertSame(0.055,$product->computeTVA());
        
    }
    public function testCar(){
        $product= new Product('**','car',1);
        $this-> assertSame(0.196,$product->computeTVA());
        
    }
    /**
     * @dataProvider priceFood
     */
    public function testMultiFood($prix, $tva)
    {
        $p = new Product("produit", "food", $prix);
        $this->assertSame($tva, $p->computeTVA());
    }

    public function priceFood()
    {
        return [
            [0.00, 0.0],   
            [1, 0.055],    
            [10, 0.55],    
            [20, 1.1],     
        ];
    }
}
