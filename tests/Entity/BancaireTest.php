<?php
   namespace App\Test\Entity;
   use App\Entity\Bancaire;
   use PHPUnit\Framework\TestCase;
   class BancaireTest extends TestCase{

    public function testInvalidSolde ()
 {
        $p = new Bancaire ( 'waed' , 5 );
        $this -> expectException ( \Exception :: class );
        $p -> retirer ( 10 );
 }

    public function testSld ()
 {
        $S = new Bancaire ( '***' , 10 );
        $S -> retirer ( 3 );
        $this -> assertSame ( 7.0 , $S -> getSolde ());
 }
   /**
 * @Data provider for tstSoldeWithProvider
 */

   
    public function  soldeProvider ()
 {
        return [
                [ 10 , 7.0 ],
                [ 5 , 2.0 ],
               [ 20 , 17.0 ],
 ];
 }
 /**
 * @dataProvider soldeProvider
 */
  
    public function testSoldeWithProvider ( $solde , $expectedSolde )
 {
        $p = new Bancaire ( '***' , $solde );
        $p -> retirer ( $solde - $expectedSolde );
        $this -> assertSame ( $expectedSolde , $p -> getSolde ());
 }

    public function testsolde ()
 {
        
        $p = new Bancaire ( '***' , 10 );
        $p -> retirer ( 3 );
        $this -> assertSame ( 7.0 , $p -> getSolde ());
 }
 }