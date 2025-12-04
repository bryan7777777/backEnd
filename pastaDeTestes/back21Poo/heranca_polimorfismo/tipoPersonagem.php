<?php
class Guerreiro extends Personagens{
    public$hp=120;
}

class Arqueiro extends Personagens{
    public$hp=80;
    public$atk=20;
    public function especial(){echo "tiro perfurante: 80";}
}

class Mago extends Personagens{
    public$hp=10;
    public$atk=100;
    public$def=0;
    public function especial(){echo "CONTEMPLE O MAGOOOOOOOOOOOOO COOOOM SEUS PODEREEEEEEEEEEEEEES INCRIVEIS PODEREEEEEEEEEEESSSSS";}
}

class Assassino extends Personagens{
    public$hp=1;
    public$atk=100;
    public$def=0;
    public function especial(){echo "desvio e te desvivo";}
}

class Paladino extends Personagens{
    public$hp=500;
    public$atk=1;
    public$def=100;
    public function especial(){echo "n vamos tomar vinho e sim jerusalem!";}
}

class Clerigo extends Personagens{
    public$atk=5;
    public$def=5;
}

class Druida extends Personagens{
    public$hp=720;
}

class Guardiao extends Personagens{
    public$hp=1020;
}

class Necromante extends Personagens{
    public$hp=1;
    public$atk=1;
    public$def=1;
    public function especial(){echo "HERGASSEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE CLT";}
}

class Bruxo extends Personagens{
    public$hp=10;
    public function especial(){echo "bruxaria de scribisdi, olho de buxa, orelha de mamifero, tu usa gacha life: 100000 damage!";}
}

class feiticeiro extends Personagens{
    public$hp=10;
    public function especial(){echo "segura até o LV15 que da pra ganha";}
}

?>