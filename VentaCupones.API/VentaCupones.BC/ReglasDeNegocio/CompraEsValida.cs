using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.DA.Entidades;

namespace VentaCupones.BC.ReglasDeNegocio
{
    public class CompraEsValida
    {
        public static bool ValidarID(int id)
        {
            // Verifica que cualquier id sea mayo a 0
            return id > 0;
        }

        public static bool ValidarPrecio(decimal precio)
        {
            // Verifica que cualquier precio sea mayo a 0
            return precio > 0;
        }

        public static bool ValidarCompra(Compra compra)
        {
            // Verifica todos los elementos necesarios de la compra
            return ValidarID(compra.IDUsuarioCliente) &&
                ValidarPrecio(compra.PrecioTotal);
        }
    }
}
