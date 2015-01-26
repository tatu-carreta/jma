<?php

class HomeController extends BaseController {

    public function inicio() {

        $items_destacados = parent::itemsDestacados();
        $slideIndex = parent::slideIndex();
        if (count($items_destacados) < 5) {
            if (count($items_destacados) > 0) {
                $destacados = array();
                foreach ($items_destacados as $item) {
                    array_push($destacados, $item->id);
                }

                $ultimos_productos = Item::where('estado', 'A')->whereNotIn('id', $destacados)->orderBy('fecha_modificacion', 'desc')->skip(0)->take(5 - count($items_destacados))->get();
            } else {
                $ultimos_productos = Item::where('estado', 'A')->orderBy('fecha_modificacion', 'desc')->skip(0)->take(5 - count($items_destacados))->get();
            }
        } else {
            $ultimos_productos = NULL;
        }

        $this->array_view['items_destacados'] = $items_destacados;
        $this->array_view['slide_index'] = $slideIndex;
        $this->array_view['ultimos_productos'] = $ultimos_productos;

        return View::make($this->project_name . '-inicio', $this->array_view);
    }

    public function contacto() {

        return View::make($this->project_name . '-contacto', $this->array_view);
    }

    public function error() {

        $texto = Session::get('texto');

        $this->array_view['texto'] = $texto;

        return View::make($this->project_name . '-error', $this->array_view);
    }

}
