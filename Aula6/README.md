# Aula6 - Exercícios 4 e 5 - Laravel

## Exercício 4: Cálculo do IMC
## Exercício 5: Avaliação das Horas de Sono

---

## Como configurar o projeto

### 1. Criar o projeto Laravel

Abra o terminal na pasta `Aula6/laravel/` e execute:

```bash
composer create-project laravel/laravel saude
cd saude
```

### 2. Copiar os arquivos deste repositório

Substitua os arquivos do projeto recém-criado pelos arquivos desta pasta:

- `routes/web.php`
- `app/Models/Imc.php`
- `app/Models/Sono.php`
- `app/Http/Controllers/ImcController.php`
- `app/Http/Controllers/SonoController.php`
- `resources/views/layout/app.blade.php`
- `resources/views/home.blade.php`
- `resources/views/imc/formulario.blade.php`
- `resources/views/imc/resultado.blade.php`
- `resources/views/sono/formulario.blade.php`
- `resources/views/sono/resultado.blade.php`

### 3. Instalar dependências e configurar

```bash
npm install && npm run build
cp .env.example .env
php artisan key:generate
```

### 4. Executar a aplicação

Em um terminal:
```bash
npm run dev
```

Em outro terminal:
```bash
php artisan serve
```

Acesse: http://localhost:8000

---

## Estrutura MVC

```
app/
  Models/
    Imc.php          <- Lógica de cálculo do IMC e idade
    Sono.php         <- Lógica de avaliação do sono por faixa etária
  Http/Controllers/
    ImcController.php    <- Controlador do IMC (index + calcular)
    SonoController.php   <- Controlador do Sono (index + avaliar)

resources/views/
  layout/
    app.blade.php        <- Template principal (Bootstrap via CDN)
  home.blade.php         <- Página inicial com opções
  imc/
    formulario.blade.php <- Formulário de entrada do IMC
    resultado.blade.php  <- Resultado do cálculo do IMC
  sono/
    formulario.blade.php <- Formulário de entrada das horas de sono
    resultado.blade.php  <- Resultado da avaliação do sono

routes/
  web.php               <- Rotas da aplicação
```

---

## Classificação do IMC

| IMC               | Classificação              |
|-------------------|----------------------------|
| Menor que 18,5    | Abaixo do peso             |
| Entre 18,5 e 24,9 | Peso normal                |
| Entre 25 e 29,9   | Acima do peso (sobrepeso)  |
| Entre 30 e 34,9   | Obesidade I                |
| Entre 35 e 39,9   | Obesidade II               |
| Maior que 40      | Obesidade III              |

## Recomendação de Horas de Sono por Faixa Etária

| Faixa Etária            | Horas Recomendadas |
|-------------------------|--------------------|
| Criança (0-2 anos)      | 11 a 14 horas      |
| Pré-escolar (3-5 anos)  | 10 a 13 horas      |
| Escolar (6-13 anos)     | 9 a 11 horas       |
| Adolescente (14-17 anos)| 8 a 10 horas       |
| Adulto (18-64 anos)     | 7 a 9 horas        |
| Idoso (65+ anos)        | 7 a 8 horas        |
