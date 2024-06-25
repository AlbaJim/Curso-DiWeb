""" 
ejemplo-06-arrays.py

Novedades:
- Declarar arrays unidimensionales
- for y foreach (for..in)
- función append -> agrega elementos al array
- str -> Conversión a String
- Uso de sort (ordenar arrays)
"""

# Función para crear y devolver un array unidimensional
def crearArray(num):
    miArray = []
    
    # range va del 0 hasta num-1. Usamos FOR
    for i in range(num):
        miArray.append(int(input(f"Dame Nº{i+1} para array: ")))
    return miArray

# Llamada a la función. Usaremos FOR-EACH
num = int(input("Dame Nº elementos array: "))
arrayDevuelto = crearArray(num)

# Ordenado array de mayor a menor
arrayDevuelto.sort(reverse=True)

mensaje = "Los valores del array son: \n"
for valor in arrayDevuelto:
    # convierto valor(int) en String
    mensaje += str(valor) + "\n"
    
print(mensaje)
