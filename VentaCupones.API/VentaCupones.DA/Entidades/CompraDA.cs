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
    [Table("Compra")]
    public class CompraDA
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int IDCompra { get; set; }

        [Required]
        public int IDUsuarioCliente { get; set; }

        [Required]
        public DateTime FechaCompra { get; set; }

        [Required]
        public decimal PrecioTotal { get; set; }

        [Required]
        public string NombreTarjetahabiente { get; set; }

        [Required]
        public string PAN { get; set; }

        public virtual IEnumerable<DetallesCompraDA> DetallesCompras { get; set; }
    }
}
