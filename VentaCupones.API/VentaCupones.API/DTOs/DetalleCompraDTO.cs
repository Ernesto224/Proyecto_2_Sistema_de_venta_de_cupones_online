using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BC.Modelos;

namespace VentaCupones.DA.Entidades
{
    public class DetalleCompraDTO
    {
        public int IDDetalle { get; set; }

        public int IDCupon { get; set; }

        public int Cantidad { get; set; }

        public decimal Precio { get; set; }
    }
}
