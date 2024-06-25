
"""
¿Os acordais del ejercicio de la edad en PHP y JS?

Novedades:
- Condicional if...elif..else
- entrada de datos (input)
- Conversión de tipos (int())
"""
# int() convierte a enteros
# if condicion: -> para condicionales
edad = int(input("Dame edad: "))
if (edad < 18):
    print("No puedes trabajar")
elif edad >=18 and edad < 65:
    print("Tienes que currar")
else:
    print("Puedes jubilarte")
