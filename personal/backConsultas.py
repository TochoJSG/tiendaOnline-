import os
from langchain.sql_database import SQLDatabase
from langchain.chat_models import ChatOpenAI
from langchain import SQLDatabaseChain

db = SQLDatabase.from_uri("sqlite:///ecommerce.db")
os.environ["OPENAI_API_KEY"] = 'tu_openai_api_key'  # Reemplazar con la clave de API real


# 3. Crear el LLM
llm = ChatOpenAI(temperature=0, model_name='gpt-3.5-turbo')

# 4. Crear la cadena de consultas a la BD
cadena = SQLDatabaseChain(llm = llm, database = db, verbose =False)

# 5. Formato personalizado de respuesta
formato = """
Dada una pregunta del usuario:
    1. Crea una consulta de sqlite3
    2. Revisa los resultados
    3. Devuelve los datos
    4. Si tienes que hacer alguna aclaración o devolver cualquier texto, que este sea
    #{question}
"""

# 6. Declarar la función para hacer la consulta
def consulta(input_usuario):
    consulta_formateada = formato.format(question=input_usuario)
    try:
        resultado = cadena.run(consulta_formateada)
        return resultado
    except Exception as e:
        return f"Error en la consulta: {str(e)}"

# Ejemplo de uso
if __name__ == "__main__":
    pregunta = "¿Cuántos productos hay en la categoría 'Electrónica'?"
    print(consulta(pregunta))
