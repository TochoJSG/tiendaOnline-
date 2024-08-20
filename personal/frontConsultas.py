#lanzar con streamlite run_c_front_end.py en el terminal

import my_backend    #codigo que creamos del back
                        #streamlit es un modulo para crear elementos Front con Python
import streamlit as front #importamos un modulo y le asignamos un alias para trabajar
from streamlit_chat import message  #importamos una particularidad

#consideremos que sl contien todos los metodos para crear interfaces de usuario (Front)

front.title("Reportes Optimizados")
front.write("Que deseas saber sobre la operacion o el negocio")

if 'preguntas' not in front.session_frontSLate:
    front.session_frontSLate.preguntas = []
if 'respuestas' not in front.session_state:
    front.session_state.respuestas = []
    
def click():
    if front.session_state.user != '':
        pregunta = front.session_state.user
        respuesta = my_backend.consulta(pregunta)
        
        front.session_state.preguntas.append(pregunta)      #insertamos 
        front.session_state.respuesta.append(respuesta))    #insertamos
        
        #limiamos campos
        front.session_state.user = ''
        
with front.form('my-form'):
    query = front.text_input('¿Como puedo ayudar? ',key='user', help='pulsa enviar para hacer la pregunta')
    submit_button = front.form_submit_button('Enviar',on_click=click)

if front.session_state.preguntas:
    for i in range(len(front.session_state.respuesta)-1, -1, -1):
        message(front.session_state.respuestas[i], key=str(i))
        
    #opcion para  no salir
    continuar_conversacion = front.checkbox('Realizar otra consulta?')
    if not continuar_conversacion:
        front.session_state.preguntas = []
        front.session_state.respuestas = []
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

#Optimizaciones y Correcciones
#Correcciones de errores tipográficos: Hay errores tipográficos en el código que deben corregirse, como session_frontSLate debería ser session_state, y respuesta debería ser respuestas.

#Uso adecuado de claves en el estado de la sesión: Asegurarse de que las claves sean consistentes y correctas.

#Uso de decoradores: @st.cache puede ayudar a optimizar el rendimiento para consultas que no cambian frecuentemente.

#Manejo de la sesión: Asegurarse de que las variables de sesión sean manejadas correctamente y que el código sea fácil de leer y mantener.

#Manejo del formulario: Mejorar la forma en que se maneja el formulario y la actualización del estado de la sesión.

#Aquí tienes una versión optimizada del código:
    
    
#Explicaciones de las optimizaciones:
#Correcciones de errores tipográficos: session_frontSLate se cambió a session_state y respuesta a respuestas para asegurar que las claves sean correctas.
#Mejor uso del estado de la sesión: Las claves del estado de la sesión se manejan de manera más coherente.
#Manejo de la entrada del formulario: La función click maneja la lógica para procesar la entrada del usuario y actualizar el estado de la sesión.
#Claridad y estructura: El código es más claro y fácil de seguir, lo que facilita el mantenimiento.
        
import my_backend    #codigo que creamos del back
                        #streamlit es un modulo para crear elementos Front con Python
import streamlit as front #importamos un modulo y le asignamos un alias para trabajar
from streamlit_chat import message  #importamos una particularidad

#consideremos que sl contien todos los metodos para crear interfaces de usuario (Front)

st.title("Reportes Optimizados")# Título de la aplicación
st.write("¿Qué deseas saber sobre la operación o el negocio?")

# Inicializar el estado de la sesión si no existe
if 'preguntas' not in st.session_state:
    st.session_state.preguntas = []
if 'respuestas' not in st.session_state:
    st.session_state.respuestas = []

# Función para manejar el clic del botón
def click():
    if st.session_state.user != '':
        pregunta = st.session_state.user
        respuesta = my_backend.consulta(pregunta)
        
        # Agregar la pregunta y la respuesta a la sesión
        st.session_state.preguntas.append(pregunta)
        st.session_state.respuestas.append(respuesta)
        
        # Limpiar el campo de entrada
        st.session_state.user = ''

# Formulario para la entrada del usuario
with st.form('my-form'):
    query = st.text_input('¿Cómo puedo ayudar?', key='user', help='Pulsa enviar para hacer la pregunta')
    submit_button = st.form_submit_button('Enviar', on_click=click)
# Mostrar las preguntas y respuestas en orden inverso
if st.session_state.preguntas:
    for i in range(len(st.session_state.respuestas)-1, -1, -1):
        message(st.session_state.respuestas[i], key=str(i))
        
    # Opción para continuar la conversación
    continuar_conversacion = st.checkbox('¿Realizar otra consulta?')
    if not continuar_conversacion:
        st.session_state.preguntas = []
        st.session_state.respuestas = []
