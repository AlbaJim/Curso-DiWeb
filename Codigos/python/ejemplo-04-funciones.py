"""
Declarar una función que pida 2 números entre 0 y 20
Y que haya una distancia entre ellos de 10.

Novedades:
- Funciones (def)
    - Parámetros de entrada
    - Return de salida
        - EXPLOOOTA! Asignación múltiple en el return
"""
def examen (cadena):
    # Declaro e inicio la variable
    num1 = num2 = 0    
    num1 = int(input("Dame numero1 0-20: "))
    while num1 < 0 or num1 > 20:
        num1 = int(input("Dame numero1 0-20: "))

    num2 = int(input(f"Dame numero2 0-20 y 10+ que {num1}: "))
    while num2 < 0 or num2 > 20 or num2 - num1 < 10:
        num2 = int(input(f"Dame numero2 0-20 y 10+ que {num1}: "))

    print(f"Los valores son: {num1} y {num2}")
    # Hacemos el return (3 variables)
    return cadena, num1, num2

# Llamada a la función
micadena, minum1, minum2 = examen ("Numeros Obtenidos ")
print (f"{micadena}: {minum1} , {minum2}")
