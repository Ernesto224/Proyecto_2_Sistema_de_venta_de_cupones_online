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
    public class CompraDTO
    {
        public int IDCompra { get; set; }

        public DateTime FechaCompra { get; set; }

        public decimal PrecioTotal { get; set; }

        public IEnumerable<DetalleCompraDTO> DetallesCompras { get; set; }
    }
}