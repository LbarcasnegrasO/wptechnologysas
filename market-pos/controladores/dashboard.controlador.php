<?php

class DashboardControlador{

    static public function ctrGetDatosDashboard(){
        
        $datos = DashboardModelo::mdlGetDatosDashboard();

        return $datos;
    }

    static public function ctrGetVentasMesActual(){
        
        $ventasMesActual = DashboardModelo::mdlGetVentasMesActual();

        return $ventasMesActual;
    }
    
    static public function crtGetProductosMasVendidos(){

        $productosMasVendidos = DashboardModelo::mdlProductosMasVendidos();

        return $productosMasVendidos;
    }

    static public function crtGetProductosPocoStock(){

        $productosPocoStock = DashboardModelo::mdlProductosPocoStock();

        return $productosPocoStock;
    }
    
}