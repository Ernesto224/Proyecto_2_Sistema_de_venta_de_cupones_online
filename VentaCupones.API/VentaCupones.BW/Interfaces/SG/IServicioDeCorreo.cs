using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace VentaCupones.BW.Interfaces.SG
{
    public interface IServicioDeCorreo
    {
        public Task<bool> EnviarCorreoDeConfirmacion(Object infromacion);
    }
}
