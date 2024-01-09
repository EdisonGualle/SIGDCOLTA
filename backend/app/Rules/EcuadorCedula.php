<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EcuadorCedula implements Rule
{
    public function passes($attribute, $value)
    {
        return $this->verificaIdentificacion($value);
    }

    public function message()
    {
        return 'La cédula no es válida.';
    }

    private function verificaIdentificacion($identificacion)
    {
        $estado = false;
        $valced = str_split(trim($identificacion));
        $provincia = (int)($valced[0] . $valced[1]);

        if (strlen($identificacion) >= 10 && $provincia > 0 && $provincia < 31) {
            if ((int)$valced[2] < 6) {
                $estado = $this->verificaCedula($valced);
            } elseif ((int)$valced[2] == 6) {
                if (count($valced) == 13) {
                    $estado = true;
                } else {
                    $estado = $this->verificaCedula($valced);
                }
            } elseif ((int)$valced[2] == 8) {
                if (count($valced) == 13) {
                    $estado = $this->verificaSectorPublico($valced);
                } else {
                    $estado = false;
                }
            } elseif ((int)$valced[2] == 9) {
                $estado = true;
            }
        }

        return $estado;
    }

    private function verificaRUCPersonaNatural($validarCedula)
    {
        try {
            $establecimiento = "001";
            $establecimientoRUC = $validarCedula[10] . $validarCedula[11] . $validarCedula[12];
            return $establecimientoRUC === $establecimiento && $this->verificaCedula($validarCedula);
        } catch (\Exception $e) {
            return false;
        }
    }

    private function verificaCedula($validarCedula)
    {
        $aux = $par = $impar = $verifi = 0;

        for ($i = 0; $i < 9; $i += 2) {
            $aux = 2 * (int)$validarCedula[$i];
            if ($aux > 9) {
                $aux -= 9;
            }
            $par += $aux;
        }

        for ($i = 1; $i < 9; $i += 2) {
            $impar += (int)$validarCedula[$i];
        }

        $aux = $par + $impar;

        if ($aux % 10 != 0) {
            $verifi = 10 - ($aux % 10);
        } else {
            $verifi = 0;
        }

        return $verifi == (int)$validarCedula[9];
    }

    private function verificaSectorPublico($validarCedula)
    {
        $aux = $prod = $veri = 0;
        $veri = (int)$validarCedula[9] + (int)$validarCedula[10] + (int)$validarCedula[11] + (int)$validarCedula[12];

        if ($veri > 0) {
            $coeficiente = [3, 2, 7, 6, 5, 4, 3, 2];

            for ($i = 0; $i < 8; $i++) {
                $prod = (int)$validarCedula[$i] * $coeficiente[$i];
                $aux += $prod;
            }

            if ($aux % 11 == 0) {
                $veri = 0;
            } elseif ($aux % 11 == 1) {
                return false;
            } else {
                $aux = $aux % 11;
                $veri = 11 - $aux;
            }

            return $veri == (int)$validarCedula[8];
        } else {
            return false;
        }
    }
}
