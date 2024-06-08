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
    public class CompraRegistroDTO
    {
        public int IDCliente { get; set; }

        public DateTime FechaDeCompra { get; set; }

        public decimal PrecioTotal { get; set; }

        public string NombreTarjetaHabiente { get; set; }

        public string PAN { get; set; }
    }
}