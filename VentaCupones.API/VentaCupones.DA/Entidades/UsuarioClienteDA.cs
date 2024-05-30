using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations.Schema;

namespace VentaCupones.DA.Entidades
{
    [Table("UsuarioCliente")]
    public class UsuarioClienteDA
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int IDUsuarioCliente { get; set; }

        [Required]
        public string Nombre { get; set; }

        [Required]
        public string Apellidos { get; set; }

        [Required]
        public string CedulaDeIdentidad { get; set; }

        [Required]
        public DateTime FechaDeNacimiento { get; set; }

        [Required]
        public string CorreoElectronico { get; set; }

        [Required]
        public string Contrasenia { get; set; }

        [Required]
        [DefaultValue(true)]
        public bool Habilitado { get; set; } = true;
    }
}
