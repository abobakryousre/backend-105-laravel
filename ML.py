import requests
res  = requests.get('http://localhost:8000/products')
print(res.content)
