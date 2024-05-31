using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations.Schema;

namespace VentaCupones.BC.Modelos
{
    public class UsuarioClienteDTO
    {
        public int IDCliente { get; set; }

        public string Nombre { get; set; }

        public string Apellidos { get; set; }

        public DateTime FechaDeNacimiento { get; set; }

        public string CorreoElectronico { get; set; }
    }
}
