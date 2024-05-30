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
        public int IDUsuarioCliente { get; set; }

        public DateTime FechaCompra { get; set; }

        public decimal PrecioTotal { get; set; }

        public string NombreTarjetahabiente { get; set; }

        public string PAN { get; set; }
    }
}