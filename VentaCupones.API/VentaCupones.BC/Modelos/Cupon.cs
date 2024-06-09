using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace VentaCupones.BC.Modelos
{
    public class Cupon
    {
        public int IDCupon { get; set; }

        public string Nombre { get; set; }

        public string Imagen { get; set; }

        public string Ubicacion { get; set;}

        public decimal PrecioCupon { get; set; }

        public string IDEmpresa {  get; set; }
        
        public string IDCategoria { get; set; }

        public decimal Descuento { get; set; }
    }
}
