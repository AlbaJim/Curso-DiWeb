""" 
ejemplo-09-diccionarios.py

Novedades:
- Diccionarios
- del -> Borrar elementos diccionario
"""

# Declaramos el diccionario ~ JSON
mi_camión = {
    "modelo" : "Volvo FH Electric",
    "potencia" : 450,
    "electrico" : True
}

# Accedemos a un elemento del diccionario
print(f"Mi Camón: {mi_camión['modelo']}")

# Añadimos otro atributo
mi_camión['ruedas'] = 8

# Modificar un valor
mi_camión['potencia'] = 750

# Quitar un atributo
del mi_camión['electrico']

# Imprimir el diccionario
print(f" Datos camión: \n {mi_camión}")

