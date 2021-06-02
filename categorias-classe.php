<?php
class categoria
{
    public function calculo_categoria_idade($idade,$plano)
    {
        if($plano=="Enfermaria")
        {
            if($idade<=18)
            {
            $valor=193.00;
            return $valor;
            }
            if($idade>=19 && $idade<=23)
            {
            $valor=221.00;
            return $valor;
            }
            if($idade>=24 && $idade<=28)
            {
            $valor=255.00;
            return $valor;
            }
            if($idade>=29 && $idade<=38)
            {
            $valor=337.00;
            return $valor;
            }
            if($idade>=39 && $idade<=53)
            {
            $valor=616.00;
            return $valor;
            }
            if($idade>54)
            {
            $valor=800.00;
            return $valor;
            }
        }
        if($plano=="Apartamento")
        {
            if($idade<=18)
            {
            $valor=282.00;
            return $valor;
            }
            if($idade>=19 && $idade<=23)
            {
            $valor=325.00;
            return $valor;
            }
            if($idade>=24 && $idade<=28)
            {
            $valor=373.00;
            return $valor;
            }
            if($idade>=29 && $idade<=38)
            {
            $valor=494.00;
            return $valor;
            }
            if($idade>=39 && $idade<=53)
            {
            $valor=902.00;
            return $valor;
            }
            if($idade>54)
            {
            $valor=1200.00;
            return $valor;
            }
        }
    }
}
?>