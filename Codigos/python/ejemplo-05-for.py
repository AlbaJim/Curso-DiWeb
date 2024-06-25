""" 
ejemplo-05-for 
Tabla de multiplicar

Novedades:
- for con incremento
- for con decremento
"""
def tabla_multiplicar(num):
    # for 1...5
    # Vale también range (1,6, +1):
    for i in range (1,6):
        print(f"{num} x {i} = {num * i}")
        
def tablaInversa(num):
    # for 5...1
    for i in range (5,0, -1):
        print(f"{num} x {i} = {num * i}")    

numero = int(input("Dame Nº para Tabla multiplicar: "))
print("Tabla multiplicar: ")
tabla_multiplicar(numero)

print("Tabla multiplicar Inversa: ")
tablaInversa(numero)
