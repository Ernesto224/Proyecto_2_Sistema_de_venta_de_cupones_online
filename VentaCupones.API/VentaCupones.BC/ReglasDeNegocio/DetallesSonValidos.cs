using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.DA.Entidades;

namespace VentaCupones.BC.ReglasDeNegocio
{
    public static class DetallesSonValidos
    {
        public static bool ValidarID(int id)
        {
            // Verifica que cualquier id sea mayo a 0
            return id > 0;
        }

        public static bool ValidarCantidad(int cantidad)
        {
            // Verifica que cualquier cantidad sea mayo a 0
            return cantidad > 0;
        }

        public static bool ValidarPrecio(decimal precio)
        {
            // Verifica que cualquier precio sea mayo a 0
            return precio > 0;
        }

        public static bool ValidarDetallesDeCompra(DetalleCompra detalleCompra)
        {
            // Verifica todos los elementos necesarios del detalle
            return ValidarID(detalleCompra.IDCompra) &&
                ValidarID(detalleCompra.IDCupon) &&
                ValidarCantidad(detalleCompra.Cantidad) &&
                ValidarPrecio(detalleCompra.Precio);
        }
    }
}
