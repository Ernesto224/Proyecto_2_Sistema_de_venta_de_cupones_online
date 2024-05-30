using VentaCupones.DA.Entidades;

namespace VentaCupones.API.Utilitarios
{
    public static class DetallesMapper
    {

        public static DetalleCompraDTO MapToDTO(DetalleCompra detalleCompra)
        {
            return new DetalleCompraDTO(){
                IDDetalle = detalleCompra.IDDetalle,
                IDCupon = detalleCompra.IDCupon,
                Cantidad = detalleCompra.Cantidad,
                Precio = detalleCompra.Precio
            };
        }

        public static DetalleCompra MapToModel(DetalleCompraRegistrarDTO detalleCompra)
        {
            return new DetalleCompra()
            {
                IDCompra = detalleCompra.IDCompra,
                IDCupon = detalleCompra.IDCupon,
                Cantidad = detalleCompra.Cantidad,
                Precio = detalleCompra.Precio
            };
        }
    }
}
