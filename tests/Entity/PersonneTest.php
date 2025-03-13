<?php
   namespace App\Test\Entity;
   use App\Entity\Personne;
   use PHPUnit\Framework\TestCase;
   class PersonneTest extends TestCase{
    public function testInvalidage(){
        $p=new Personne('amin','moussi',-3);
        $this->expectException('Exception');
        $p->categorie();
    }
    public function testPersone(){
        $personne= new Personne('ahmed','aaa',19);
        $this-> assertSame("majeur",$personne->categorie());
    }
    public function testFille(){
        $personne= new Personne('hanin','moussi',12);
        $this-> assertSame("mineur",$personne->categorie());
        
    }
   /**
     * @dataProvider ageCD
     */
    public function testSamee($age, $categorie)
    {
        $p = new Personne("Ahmed","gref", $age);
        $this->assertSame($categorie, $p->categorie());
    }

    public function ageCD()
    {
        return [
            [12, "mineur"],   // 12 ans → mineur
            [24, "majeur"],    // 24 ans → majeur
            [10, "mineur"],    // 10 ans → mineur
            [15, "mineur"],    // 15 ans → mineur
        ];
    }
}    