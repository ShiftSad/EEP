# Nome: Victor Rosa Lima - RA: 51346

# Tarefa: for

## Diretório: for

### Exercício 1 - Multiplos de 3 entre 10 e 51 (./for/1_Multiplos_de_3_entre_10_e_51.c)

```c
#include <stdio.h>

int main() {
    for (int i = 10; i <= 51; i++) {
        if (i % 3 == 0) {
            printf("%d é um múltiplo de 3\n", i);
        }
    }
}
```

### Exercício 2 - Numeros Pares Decrescentes (./for/2_Numeros_Pares_Decrescentes.c)

```c
#include <stdio.h>

int main() {
    for (int i = 100; i >= 0; i--) {
        if (i % 2 == 0) {
            printf("%d é um número par\n", i);
        }
    }
}
```

### Exercício 3 - Media e Soma Idades (./for/3_Media_e_Soma_Idades.c)

```c
#include <stdio.h>

int main() {
    float soma = 0;
    for (int i = 0; i <= 5; i++) {
        float temp;
        printf("Coloque a nota %d", i);
        scanf("%f", &temp);
        soma += temp;
    }

    printf("Média das idades: %f", soma / 5.0);
    printf("Soma das idades: %f", soma);
}
```

### Exercício 4 - Contador Pares Impares (./for/4_Contador_Pares_Impares.c)

```c
#include <stdio.h>

int main() {
    int pares = 0;
    int inpares = 0;

    for (int i = 0; i <= 10; i++) {
        int temp;
        printf("Coloque o número %d: ", i);
        scanf("%d", &temp);

        if (temp % 2 == 0) pares++;
        else inpares++;
    }

    printf("Quantidade de números pares: %d\n", pares);
    printf("Quantidade de números ímpares: %d\n", inpares);
}
```

### Exercício 5 - Numeros Intervalo 5 9 (./for/5_Numeros_Intervalo_5_9.c)

```c
#include <stdio.h>

int main() {
    int found = 0;
    for (int i = 0; i <= 8; i++) {
        int temp;
        printf("Coloque o número %d: ", i);
        scanf("%d", &temp);

        if (temp >= 5 && temp <= 9) {
            found += 1;
        }
    } 

    printf("Quantidade de números entre 5 e 9: %d\n", found);
    printf("Quantidade de números fora do intervalo: %d\n", 10 - found);
}
```

### Exercício 6 - Gerenciamento Conta Corrente (./for/6_Gerenciamento_Conta_Corrente.c)

```c
#include <stdio.h>

int main() {
    float initial = 0;
    float initialCopy = 0;

    printf("Qual o valor inicial? ");
    scanf("%f", &initial);
    initialCopy = initial;

    for (int i = 0; i <= 5; i++) {
        char transaction;
        float amount;
        printf("Qual o tipo de transação? (D para depósito ou S para saque): ");
        scanf(" %c", &transaction);
        printf("Qual o valor da transação? ");
        scanf("%f", &amount);

        if (transaction == 'D' || transaction == 'd') {
            initial += amount;
        } else if (transaction == 'S' || transaction == 's') {
            initial -= amount;
        } else {
            printf("Transação inválida. Tente novamente.\n");
            i--;
        }
    }

    printf("Saldo inicial: %.2f\n", initialCopy);
    printf("Saldo final: %.2f\n", initial);
}
```

### Exercício 7 - Altura Joao e Maria (./for/7_Altura_Joao_e_Maria.c)

```c
#include <stdio.h>

int main() {
    int joaoAge = 10;
    int mariaAge = 13;

    int joaoHeight = 121;
    int mariaHeight = 158;

    int joaoGain = 2;
    int mariaGain = 1;

    // Pq for e não while?
    for (int i = 0; i <= 100; i++) {
        if (joaoHeight < mariaHeight) {
            joaoHeight += joaoGain;
            mariaHeight += mariaGain;
        } else {
            printf("João é mais alto que Maria após %d anos\n", i + 1);
            break;
        }
    }
}
```

### Exercício 8 - Analise Pessoas (./for/8_Analise_Pessoas.c)

```c
#include <stdio.h>

int main() {
    int overFifty = 0;
    int totalHeight = 0;
    int weightLessThanForty = 0;

    for (int i = 0; i <= 5; i++) {
        int height;
        int weight;
        int age;
        printf("Coloque a altura %d: ", i);
        scanf("%d", &height);
        printf("Coloque o peso %d: ", i);
        scanf("%d", &weight);
        printf("Coloque a idade %d: ", i);
        scanf("%d", &age);

        if (weight < 40) weightLessThanForty++;
        if (age > 50) overFifty++;
        if (age >= 10 && age <= 20) totalHeight += height;
    }

    printf("Quantidade de pessoas com mais de 50 anos: %d\n", overFifty);
    printf("Peso médio das pessoas entre 10 a 20 anos: %f\n", totalHeight / 5.0);
    printf("Porcentagem de pessoas com peso inferior a 40: %f\n", (weightLessThanForty / 5.0) * 100.0);
}
```

### Exercício 9 - Analise Frigorifico (./for/9_Analise_Frigorifico.c)

```c
#include <stdio.h>

int main() {
    int i, codigo, codigoMaisGordo, codigoMaisMagro;
    float peso, pesoTotal = 0;
    float maiorPeso = 0, menorPeso = 100000;

    for (i = 1; i <= 7; i++) {
        printf("Digite o código do boi %d: ", i);
        scanf("%d", &codigo);

        printf("Digite o peso do boi %d (em kg): ", i);
        scanf("%f", &peso);

        pesoTotal += peso;

        if (peso > maiorPeso) {
            maiorPeso = peso;
            codigoMaisGordo = codigo;
        }

        if (peso < menorPeso) {
            menorPeso = peso;
            codigoMaisMagro = codigo;
        }
    }

    printf("\nO boi mais gordo tem código %d e pesa %f kg.\n", codigoMaisGordo, maiorPeso);
    printf("O boi mais magro tem código %d e pesa %f kg.\n", codigoMaisMagro, menorPeso);
    printf("O peso médio de todos os bois é %f kg.\n", pesoTotal / 7);
}

```

### Exercício 10 - Soma Serie (./for/10_Soma_Serie.c)

```c
#include <stdio.h>

int main() {
    double sum = 1;

    for (int i = 2; i <= 50; i++) {
        sum += (i * 2.0 - 1.0) / (double) i;
    }

    printf("Soma: %f\n", sum);
}
```

### Exercício 11 - Verificador Primo (./for/11_Verificador_Primo.c)

```c
#include <stdio.h>
#include <math.h>

int main() {
    int num = 0;
    int isPrime = 1;

    printf("Digite um número: ");
    scanf("%d", &num);

    for (int i = 1; i * i <= num; i++) {
        if (num % i == 0 && i != 1 && i != num) {
            isPrime = 1;
            break;
        }
    }

    if (isPrime == 1) printf("%d é um número primo\n", num);
    else printf("%d não é um número primo\n", num);
}
```

### Exercício 12 - Salario Funcionario (./for/12_Salario_Funcionario.c)

```c
#include <stdio.h>

int main() {
    double employeeInitialSalary = 2000.0;
    double employeeCurrentSalary = employeeInitialSalary;
    double annualRaiseRate = 0.015;
    int calculationStartYear = 1996;
    int calculationEndYear = 2025;

    printf("Calculando salario anual a partir de %d ate %d:\n", calculationStartYear, calculationEndYear);

    for (int yearCounter = calculationStartYear; yearCounter <= calculationEndYear; yearCounter++) {
        employeeCurrentSalary = employeeCurrentSalary * (1.0 + annualRaiseRate);

        if (yearCounter >= 1997) {
            annualRaiseRate = annualRaiseRate * 2.0;
        }

        printf("Salario no final de %d: %.2f\n", yearCounter, employeeCurrentSalary);
    }

    printf("\nO salario atual (final de %d) do funcionario eh: %.2f\n", calculationEndYear, employeeCurrentSalary);
}

```

### Exercício 13 - Saque Notas Banco (./for/13_Saque_Notas_Banco.c)

```c
#include <stdio.h>

int main() {
    int withdrawalRequestedAmount;
    int availableNoteValues[] = {100, 50, 20, 10, 5, 2, 1};
    int calculatedNumberOfNotes[] = {0, 0, 0, 0, 0, 0, 0};
    int numberOfNoteTypes = 7;

    printf("Digite o valor do saque: ");
    scanf("%d", &withdrawalRequestedAmount);

    int amountStillToDistribute = withdrawalRequestedAmount;

    printf("Para um saque de %d, as notas sao:\n", withdrawalRequestedAmount);

    for (int noteTypeIndex = 0; noteTypeIndex < numberOfNoteTypes; noteTypeIndex++) {
        int currentNoteDenomination = availableNoteValues[noteTypeIndex];
        
        calculatedNumberOfNotes[noteTypeIndex] = amountStillToDistribute / currentNoteDenomination;
        
        amountStillToDistribute = amountStillToDistribute % currentNoteDenomination;

        if (calculatedNumberOfNotes[noteTypeIndex] > 0) {
            printf("%d nota(s) de %d\n", calculatedNumberOfNotes[noteTypeIndex], currentNoteDenomination);
        }
    }
}

```

### Exercício 14 - Pesquisa Pessoas (./for/14_Pesquisa_Pessoas.c)

```c
#include <stdio.h>

int main() {
    int totalPeopleToRead = 6;
    char personSexInput;
    char personEyeColorInput;
    int personAgeInput;

    int greenEyesTotalCount = 0;
    int brownEyesTotalCount = 0;
    int blueEyesTotalCount = 0;
    int femaleGreenEyesCount = 0;
    int maleBlueEyesCount = 0;
    int femaleBrownEyesCount = 0;
    int femaleTotalCount = 0;

    for (int personIndex = 0; personIndex < totalPeopleToRead; personIndex++) {
        printf("Dados da pessoa %d:\n", personIndex + 1);
        
        printf("Sexo (f/m): ");
        scanf(" %c", &personSexInput);

        printf("Cor dos olhos (v-verdes, c-castanhos, a-azuis): ");
        scanf(" %c", &personEyeColorInput);

        printf("Idade: ");
        scanf("%d", &personAgeInput);

        if (personEyeColorInput == 'v') {
            greenEyesTotalCount++;
        } else if (personEyeColorInput == 'c') {
            brownEyesTotalCount++;
        } else if (personEyeColorInput == 'a') {
            blueEyesTotalCount++;
        }

        if (personSexInput == 'f') {
            femaleTotalCount++;
            if (personEyeColorInput == 'v') {
                femaleGreenEyesCount++;
            } else if (personEyeColorInput == 'c') {
                femaleBrownEyesCount++;
            }
        } else if (personSexInput == 'm') {
             if (personEyeColorInput == 'a') {
                maleBlueEyesCount++;
            }
        }
    }

    printf("\nResultados da analise:\n");
    printf("a. Quantidade de pessoas com olhos verdes: %d\n", greenEyesTotalCount);
    printf("b. Quantidade de pessoas com olhos castanhos: %d\n", brownEyesTotalCount);
    printf("c. Quantidade de pessoas com olhos azuis: %d\n", blueEyesTotalCount);
    printf("d. Quantidade de pessoas do sexo feminino com cor de olhos verdes: %d\n", femaleGreenEyesCount);
    printf("e. Quantidade de pessoas do sexo masculino com cor de olhos azuis: %d\n", maleBlueEyesCount);
    
    if (femaleTotalCount > 0) {
         double percentageFemaleBrownEyes = (double)femaleBrownEyesCount / femaleTotalCount * 100.0;
         printf("f. Porcentagem de pessoas do sexo feminino com cor de olhos castanhos: %.2f%%\n", percentageFemaleBrownEyes);
    } else {
         printf("f. Porcentagem de pessoas do sexo feminino com cor de olhos castanhos: N/A (nenhuma pessoa do sexo feminino informada)\n");
    }
}

```

### Exercício 15 - Autenticacao Senha (./for/15_Autenticacao_Senha.c)

```c
#include <stdio.h>
#include <string.h>

int main() {
    int correctPassword = 123456; 
    int enteredPassword;
    int maximumAllowedAttempts = 3;
    int accessGrantedFlag = 0; 

    printf("Digite a senha numerica de 6 digitos.\n");

    for (int attemptCounter = 1; attemptCounter <= maximumAllowedAttempts; attemptCounter++) {
        printf("Tentativa %d de %d: ", attemptCounter, maximumAllowedAttempts);
        scanf("%d", &enteredPassword);

        if (enteredPassword == correctPassword) {
            printf("acesso permitido\n");
            accessGrantedFlag = 1;
            break; 
        } 
        else if (attemptCounter < maximumAllowedAttempts) printf("Senha incorreta. Tente novamente.\n");
    }

    if (accessGrantedFlag == 0) printf("acesso negado\n");
}

```

## Tarefa: while

### Diretório: while

### Exercício 1 - Múltiplos de 3 entre 10 e 51 (./while/1_Multiplos_de_3_entre_10_e_51.c)

```c
#include <stdio.h>

int main() {
    int i = 10;
    while (i <= 51) {
        if (i % 3 == 0) {
            printf("%d é um múltiplo de 3\n", i);
        }
        i++;
    }
    return 0;
}
```

### Exercício 2 - Números Pares Decrescentes (./while/2_Numeros_Pares_Decrescentes.c)

```c
#include <stdio.h>

int main() {
    int i = 100;
    while (i >= 0) {
        if (i % 2 == 0) {
            printf("%d é um número par\n", i);
        }
        i--;
    }
    return 0;
}
```

### Exercício 3 - Média e Soma Idades (./while/3_Media_e_Soma_Idades.c)

```c
#include <stdio.h>

int main() {
    float soma = 0;
    int count = 0;
    while (count <= 5) {
        float temp;
        printf("Coloque a idade %d: ", count + 1);
        scanf("%f", &temp);
        soma += temp;
        count++;
    }

    printf("Média das idades: %f\n", soma / 6.0); // Corrigido para dividir por 6
    printf("Soma das idades: %f\n", soma);
    return 0;
}
```

### Exercício 4 - Contador Pares Impares (./while/4_Contador_Pares_Impares.c)

```c
#include <stdio.h>

int main() {
    int pares = 0;
    int impares = 0;
    int count = 0;

    while (count <= 10) {
        int temp;
        printf("Coloque o número %d: ", count + 1);
        scanf("%d", &temp);

        if (temp % 2 == 0)
            pares++;
        else
            impares++;
        count++;
    }

    printf("Quantidade de números pares: %d\n", pares);
    printf("Quantidade de números ímpares: %d\n", impares);
    return 0;
}
```

### Exercício 5 - Números Intervalo 5 9 (./while/5_Numeros_Intervalo_5_9.c)

```c
#include <stdio.h>

int main() {
    int found = 0;
    int count = 0;
    while (count <= 8) {
        int temp;
        printf("Coloque o número %d: ", count + 1);
        scanf("%d", &temp);

        if (temp >= 5 && temp <= 9) {
            found += 1;
        }
        count++;
    }

    printf("Quantidade de números entre 5 e 9: %d\n", found);
    printf("Quantidade de números fora do intervalo: %d\n", 9 - found); // Corrigido para 9
    return 0;
}
```

### Exercício 6 - Gerenciamento Conta Corrente (./while/6_Gerenciamento_Conta_Corrente.c)

```c
#include <stdio.h>

int main() {
    float initial = 0;
    float initialCopy = 0;
    int count = 0;

    printf("Qual o valor inicial? ");
    scanf("%f", &initial);
    initialCopy = initial;

    while (count <= 5) {
        char transaction;
        float amount;
        printf("Qual o tipo de transação? (D para depósito ou S para saque): ");
        scanf(" %c", &transaction);
        printf("Qual o valor da transação? ");
        scanf("%f", &amount);

        if (transaction == 'D' || transaction == 'd') {
            initial += amount;
            count++;
        } else if (transaction == 'S' || transaction == 's') {
            initial -= amount;
            count++;
        } else {
            printf("Transação inválida. Tente novamente.\n");
        }
    }

    printf("Saldo inicial: %.2f\n", initialCopy);
    printf("Saldo final: %.2f\n", initial);
    return 0;
}
```

### Exercício 7 - Altura Joao e Maria (./while/7_Altura_Joao_e_Maria.c)

```c
#include <stdio.h>

int main() {
    int joaoAge = 10;
    int mariaAge = 13;

    int joaoHeight = 121;
    int mariaHeight = 158;

    int joaoGain = 2;
    int mariaGain = 1;
    int years = 0;

    while (joaoHeight < mariaHeight) {
        joaoHeight += joaoGain;
        mariaHeight += mariaGain;
        years++;
    }

    printf("João é mais alto que Maria após %d anos\n", years);
    return 0;
}
```

### Exercício 8 - Análise Pessoas (./while/8_Analise_Pessoas.c)

```c
#include <stdio.h>

int main() {
    int overFifty = 0;
    int totalHeight = 0;
    int weightLessThanForty = 0;
    int count = 0;
    int countTenTwenty = 0;

    while (count <= 5) {
        int height;
        int weight;
        int age;
        printf("Coloque a altura %d: ", count + 1);
        scanf("%d", &height);
        printf("Coloque o peso %d: ", count + 1);
        scanf("%d", &weight);
        printf("Coloque a idade %d: ", count + 1);
        scanf("%d", &age);

        if (weight < 40)
            weightLessThanForty++;
        if (age > 50)
            overFifty++;
        if (age >= 10 && age <= 20) {
            totalHeight += height;
            countTenTwenty++;
        }
        count++;
    }

    printf("Quantidade de pessoas com mais de 50 anos: %d\n", overFifty);
    if (countTenTwenty > 0) {
        printf("Peso médio das pessoas entre 10 a 20 anos: %f\n",
               (float)totalHeight / countTenTwenty);
    } else {
        printf("Peso médio das pessoas entre 10 a 20 anos: N/A\n");
    }
    printf("Porcentagem de pessoas com peso inferior a 40: %f%%\n",
           ((float)weightLessThanForty / 6.0) * 100.0); // Corrigido para 6
    return 0;
}
```

### Exercício 9 - Análise Frigorífico (./while/9_Analise_Frigorifico.c)

```c
#include <stdio.h>

int main() {
    int i = 1, codigo, codigoMaisGordo = 0, codigoMaisMagro = 0;
    float peso, pesoTotal = 0;
    float maiorPeso = 0, menorPeso = 100000;

    while (i <= 7) {
        printf("Digite o código do boi %d: ", i);
        scanf("%d", &codigo);

        printf("Digite o peso do boi %d (em kg): ", i);
        scanf("%f", &peso);

        pesoTotal += peso;

        if (peso > maiorPeso) {
            maiorPeso = peso;
            codigoMaisGordo = codigo;
        }

        if (peso < menorPeso) {
            menorPeso = peso;
            codigoMaisMagro = codigo;
        }
        i++;
    }

    printf("\nO boi mais gordo tem código %d e pesa %f kg.\n", codigoMaisGordo, maiorPeso);
    printf("O boi mais magro tem código %d e pesa %f kg.\n", codigoMaisMagro, menorPeso);
    printf("O peso médio de todos os bois é %f kg.\n", pesoTotal / 7);
    return 0;
}
```

### Exercício 10 - Soma Série (./while/10_Soma_Serie.c)

```c
#include <stdio.h>

int main() {
    double sum = 1;
    int i = 2;

    while (i <= 50) {
        sum += (i * 2.0 - 1.0) / (double)i;
        i++;
    }

    printf("Soma: %f\n", sum);
    return 0;
}
```

### Exercício 11 - Verificador Primo (./while/11_Verificador_Primo.c)

```c
#include <stdio.h>
#include <math.h>

int main() {
    int num = 0;
    int isPrime = 1;
    int i = 2; // Começa do 2 para verificar divisores

    printf("Digite um número: ");
    scanf("%d", &num);

    if (num <= 1) { // Números menores ou iguais a 1 não são primos
        isPrime = 0;
    } else {
        while (i * i <= num) {
            if (num % i == 0) {
                isPrime = 0;
                break;
            }
            i++;
        }
    }

    if (isPrime == 1)
        printf("%d é um número primo\n", num);
    else
        printf("%d não é um número primo\n", num);
    return 0;
}
```

### Exercício 12 - Salário Funcionário (./while/12_Salario_Funcionario.c)

```c
#include <stdio.h>

int main() {
    double employeeInitialSalary = 2000.0;
    double employeeCurrentSalary = employeeInitialSalary;
    double annualRaiseRate = 0.015;
    int calculationStartYear = 1996;
    int calculationEndYear = 2025;
    int yearCounter = calculationStartYear;

    printf("Calculando salario anual a partir de %d ate %d:\n",
           calculationStartYear, calculationEndYear);

    while (yearCounter <= calculationEndYear) {
        if (yearCounter > 1996) { // Aumento de 1.5% apenas a partir de 1997
            employeeCurrentSalary = employeeCurrentSalary * (1.0 + annualRaiseRate);
            annualRaiseRate = annualRaiseRate * 2.0; // Dobra a taxa para o próximo ano
        }

        printf("Salario no final de %d: %.2f\n", yearCounter, employeeCurrentSalary);
        yearCounter++;
    }

    printf("\nO salario atual (final de %d) do funcionario eh: %.2f\n",
           calculationEndYear, employeeCurrentSalary);
    return 0;
}
```

### Exercício 13 - Saque Notas Banco (./while/13_Saque_Notas_Banco.c)

```c
#include <stdio.h>

int main() {
    int withdrawalRequestedAmount;
    int availableNoteValues[] = {100, 50, 20, 10, 5, 2, 1};
    int calculatedNumberOfNotes[7] = {0};
    int numberOfNoteTypes = 7;

    printf("Digite o valor do saque: ");
    scanf("%d", &withdrawalRequestedAmount);

    int amountStillToDistribute = withdrawalRequestedAmount;
    int noteTypeIndex = 0;

    printf("Para um saque de %d, as notas sao:\n", withdrawalRequestedAmount);

    while (noteTypeIndex < numberOfNoteTypes) {
        int currentNoteDenomination = availableNoteValues[noteTypeIndex];

        calculatedNumberOfNotes[noteTypeIndex] =
            amountStillToDistribute / currentNoteDenomination;

        amountStillToDistribute = amountStillToDistribute % currentNoteDenomination;

        if (calculatedNumberOfNotes[noteTypeIndex] > 0) {
            printf("%d nota(s) de %d\n", calculatedNumberOfNotes[noteTypeIndex],
                   currentNoteDenomination);
        }
        noteTypeIndex++;
    }
    return 0;
}
```

### Exercício 14 - Pesquisa Pessoas (./while/14_Pesquisa_Pessoas.c)

```c
#include <stdio.h>

int main() {
    int totalPeopleToRead = 6;
    char personSexInput;
    char personEyeColorInput;
    int personAgeInput;

    int greenEyesTotalCount = 0;
    int brownEyesTotalCount = 0;
    int blueEyesTotalCount = 0;
    int femaleGreenEyesCount = 0;
    int maleBlueEyesCount = 0;
    int femaleBrownEyesCount = 0;
    int femaleTotalCount = 0;
    int personIndex = 0;

    while (personIndex < totalPeopleToRead) {
        printf("Dados da pessoa %d:\n", personIndex + 1);

        printf("Sexo (f/m): ");
        scanf(" %c", &personSexInput);

        printf("Cor dos olhos (v-verdes, c-castanhos, a-azuis): ");
        scanf(" %c", &personEyeColorInput);

        printf("Idade: ");
        scanf("%d", &personAgeInput);

        if (personEyeColorInput == 'v') {
            greenEyesTotalCount++;
        } else if (personEyeColorInput == 'c') {
            brownEyesTotalCount++;
        } else if (personEyeColorInput == 'a') {
            blueEyesTotalCount++;
        }

        if (personSexInput == 'f') {
            femaleTotalCount++;
            if (personEyeColorInput == 'v') {
                femaleGreenEyesCount++;
            } else if (personEyeColorInput == 'c') {
                femaleBrownEyesCount++;
            }
        } else if (personSexInput == 'm') {
            if (personEyeColorInput == 'a') {
                maleBlueEyesCount++;
            }
        }
        personIndex++;
    }

    printf("\nResultados da analise:\n");
    printf("a. Quantidade de pessoas com olhos verdes: %d\n", greenEyesTotalCount);
    printf("b. Quantidade de pessoas com olhos castanhos: %d\n", brownEyesTotalCount);
    printf("c. Quantidade de pessoas com olhos azuis: %d\n", blueEyesTotalCount);
    printf("d. Quantidade de pessoas do sexo feminino com cor de olhos verdes: %d\n",
           femaleGreenEyesCount);
    printf("e. Quantidade de pessoas do sexo masculino com cor de olhos azuis: %d\n",
           maleBlueEyesCount);

    if (femaleTotalCount > 0) {
        double percentageFemaleBrownEyes =
            (double)femaleBrownEyesCount / femaleTotalCount * 100.0;
        printf("f. Porcentagem de pessoas do sexo feminino com cor de olhos castanhos: %.2f%%\n",
               percentageFemaleBrownEyes);
    } else {
        printf("f. Porcentagem de pessoas do sexo feminino com cor de olhos castanhos: N/A "
               "(nenhuma pessoa do sexo feminino informada)\n");
    }
    return 0;
}
```

### Exercício 15 - Autenticação Senha (./while/15_Autenticacao_Senha.c)

```c
#include <stdio.h>
#include <string.h>

int main() {
    int correctPassword = 123456;
    int enteredPassword;
    int maximumAllowedAttempts = 3;
    int accessGrantedFlag = 0;
    int attemptCounter = 1;

    printf("Digite a senha numerica de 6 digitos.\n");

    while (attemptCounter <= maximumAllowedAttempts) {
        printf("Tentativa %d de %d: ", attemptCounter, maximumAllowedAttempts);
        scanf("%d", &enteredPassword);

        if (enteredPassword == correctPassword) {
            printf("acesso permitido\n");
            accessGrantedFlag = 1;
            break;
        } else if (attemptCounter < maximumAllowedAttempts) {
            printf("Senha incorreta. Tente novamente.\n");
        }
        attemptCounter++;
    }

    if (accessGrantedFlag == 0)
        printf("acesso negado\n");
    return 0;
}
```

## Tarefa: do while

### Diretório: do_while

### Exercício 1 - Múltiplos de 3 entre 10 e 51 (./do_while/1_Multiplos_de_3_entre_10_e_51.c)

```c
#include <stdio.h>

int main() {
    int i = 10;
    do {
        if (i % 3 == 0) {
            printf("%d é um múltiplo de 3\n", i);
        }
        i++;
    } while (i <= 51);
    return 0;
}
```

### Exercício 2 - Números Pares Decrescentes (./do_while/2_Numeros_Pares_Decrescentes.c)

```c
#include <stdio.h>

int main() {
    int i = 100;
    do {
        if (i % 2 == 0) {
            printf("%d é um número par\n", i);
        }
        i--;
    } while (i >= 0);
    return 0;
}
```

### Exercício 3 - Média e Soma Idades (./do_while/3_Media_e_Soma_Idades.c)

```c
#include <stdio.h>

int main() {
    float soma = 0;
    int count = 0;
    do {
        float temp;
        printf("Coloque a idade %d: ", count + 1);
        scanf("%f", &temp);
        soma += temp;
        count++;
    } while (count <= 5); // Executa 6 vezes para 6 idades

    printf("Média das idades: %f\n", soma / 6.0);
    printf("Soma das idades: %f\n", soma);
    return 0;
}
```

### Exercício 4 - Contador Pares Impares (./do_while/4_Contador_Pares_Impares.c)

```c
#include <stdio.h>

int main() {
    int pares = 0;
    int impares = 0;
    int count = 0;

    do {
        int temp;
        printf("Coloque o número %d: ", count + 1);
        scanf("%d", &temp);

        if (temp % 2 == 0)
            pares++;
        else
            impares++;
        count++;
    } while (count <= 10); // Executa 11 vezes para 11 números

    printf("Quantidade de números pares: %d\n", pares);
    printf("Quantidade de números ímpares: %d\n", impares);
    return 0;
}
```

### Exercício 5 - Números Intervalo 5 9 (./do_while/5_Numeros_Intervalo_5_9.c)

```c
#include <stdio.h>

int main() {
    int found = 0;
    int count = 0;
    do {
        int temp;
        printf("Coloque o número %d: ", count + 1);
        scanf("%d", &temp);

        if (temp >= 5 && temp <= 9) {
            found += 1;
        }
        count++;
    } while (count <= 8); // Executa 9 vezes para 9 números

    printf("Quantidade de números entre 5 e 9: %d\n", found);
    printf("Quantidade de números fora do intervalo: %d\n", 9 - found);
    return 0;
}
```

### Exercício 6 - Gerenciamento Conta Corrente (./do_while/6_Gerenciamento_Conta_Corrente.c)

```c
#include <stdio.h>

int main() {
    float initial = 0;
    float initialCopy = 0;
    int count = 0;
    char transaction;
    float amount;

    printf("Qual o valor inicial? ");
    scanf("%f", &initial);
    initialCopy = initial;

    do {
        printf("Qual o tipo de transação? (D para depósito ou S para saque): ");
        scanf(" %c", &transaction);
        printf("Qual o valor da transação? ");
        scanf("%f", &amount);

        if (transaction == 'D' || transaction == 'd') {
            initial += amount;
            count++;
        } else if (transaction == 'S' || transaction == 's') {
            initial -= amount;
            count++;
        } else {
            printf("Transação inválida. Tente novamente.\n");
        }
    } while (count <= 5); // Executa 6 transações

    printf("Saldo inicial: %.2f\n", initialCopy);
    printf("Saldo final: %.2f\n", initial);
    return 0;
}
```

### Exercício 7 - Altura Joao e Maria (./do_while/7_Altura_Joao_e_Maria.c)

```c
#include <stdio.h>

int main() {
    int joaoAge = 10;
    int mariaAge = 13;

    int joaoHeight = 121;
    int mariaHeight = 158;

    int joaoGain = 2;
    int mariaGain = 1;
    int years = 0;

    do {
        if (joaoHeight < mariaHeight) {
            joaoHeight += joaoGain;
            mariaHeight += mariaGain;
            years++;
        } else {
            break; // João já é mais alto ou igual
        }
    } while (1); // Loop infinito até que João seja mais alto

    printf("João é mais alto que Maria após %d anos\n", years);
    return 0;
}
```

### Exercício 8 - Análise Pessoas (./do_while/8_Analise_Pessoas.c)

```c
#include <stdio.h>

int main() {
    int overFifty = 0;
    int totalHeight = 0;
    int weightLessThanForty = 0;
    int count = 0;
    int countTenTwenty = 0;
    int height, weight, age;

    do {
        printf("Coloque a altura %d: ", count + 1);
        scanf("%d", &height);
        printf("Coloque o peso %d: ", count + 1);
        scanf("%d", &weight);
        printf("Coloque a idade %d: ", count + 1);
        scanf("%d", &age);

        if (weight < 40)
            weightLessThanForty++;
        if (age > 50)
            overFifty++;
        if (age >= 10 && age <= 20) {
            totalHeight += height;
            countTenTwenty++;
        }
        count++;
    } while (count <= 5); // Executa 6 vezes para 6 pessoas

    printf("Quantidade de pessoas com mais de 50 anos: %d\n", overFifty);
    if (countTenTwenty > 0) {
        printf("Peso médio das pessoas entre 10 a 20 anos: %f\n",
               (float)totalHeight / countTenTwenty);
    } else {
        printf("Peso médio das pessoas entre 10 a 20 anos: N/A\n");
    }
    printf("Porcentagem de pessoas com peso inferior a 40: %f%%\n",
           ((float)weightLessThanForty / 6.0) * 100.0);
    return 0;
}
```

### Exercício 9 - Análise Frigorífico (./do_while/9_Analise_Frigorifico.c)

```c
#include <stdio.h>

int main() {
    int i = 1, codigo, codigoMaisGordo = 0, codigoMaisMagro = 0;
    float peso, pesoTotal = 0;
    float maiorPeso = 0, menorPeso = 100000;

    do {
        printf("Digite o código do boi %d: ", i);
        scanf("%d", &codigo);

        printf("Digite o peso do boi %d (em kg): ", i);
        scanf("%f", &peso);

        pesoTotal += peso;

        if (peso > maiorPeso) {
            maiorPeso = peso;
            codigoMaisGordo = codigo;
        }

        if (peso < menorPeso) {
            menorPeso = peso;
            codigoMaisMagro = codigo;
        }
        i++;
    } while (i <= 7); // Executa 7 vezes para 7 bois

    printf("\nO boi mais gordo tem código %d e pesa %f kg.\n", codigoMaisGordo, maiorPeso);
    printf("O boi mais magro tem código %d e pesa %f kg.\n", codigoMaisMagro, menorPeso);
    printf("O peso médio de todos os bois é %f kg.\n", pesoTotal / 7);
    return 0;
}
```

### Exercício 10 - Soma Série (./do_while/10_Soma_Serie.c)

```c
#include <stdio.h>

int main() {
    double sum = 1;
    int i = 2;

    do {
        sum += (i * 2.0 - 1.0) / (double)i;
        i++;
    } while (i <= 50);

    printf("Soma: %f\n", sum);
    return 0;
}
```

### Exercício 11 - Verificador Primo (./do_while/11_Verificador_Primo.c)

```c
#include <stdio.h>
#include <math.h>

int main() {
    int num = 0;
    int isPrime = 1;
    int i = 2;

    printf("Digite um número: ");
    scanf("%d", &num);

    if (num <= 1) {
        isPrime = 0;
    } else {
        do {
            if (num % i == 0) {
                isPrime = 0;
                break;
            }
            i++;
        } while (i * i <= num);
    }

    if (isPrime == 1)
        printf("%d é um número primo\n", num);
    else
        printf("%d não é um número primo\n", num);
    return 0;
}
```

### Exercício 12 - Salário Funcionário (./do_while/12_Salario_Funcionario.c)

```c
#include <stdio.h>

int main() {
    double employeeInitialSalary = 2000.0;
    double employeeCurrentSalary = employeeInitialSalary;
    double annualRaiseRate = 0.015;
    int calculationStartYear = 1996;
    int calculationEndYear = 2025;
    int yearCounter = calculationStartYear;

    printf("Calculando salario anual a partir de %d ate %d:\n",
           calculationStartYear, calculationEndYear);

    do {
        if (yearCounter > 1996) {
            employeeCurrentSalary = employeeCurrentSalary * (1.0 + annualRaiseRate);
            annualRaiseRate = annualRaiseRate * 2.0;
        }

        printf("Salario no final de %d: %.2f\n", yearCounter, employeeCurrentSalary);
        yearCounter++;
    } while (yearCounter <= calculationEndYear);

    printf("\nO salario atual (final de %d) do funcionario eh: %.2f\n",
           calculationEndYear, employeeCurrentSalary);
    return 0;
}
```

### Exercício 13 - Saque Notas Banco (./do_while/13_Saque_Notas_Banco.c)

```c
#include <stdio.h>

int main() {
    int withdrawalRequestedAmount;
    int availableNoteValues[] = {100, 50, 20, 10, 5, 2, 1};
    int calculatedNumberOfNotes[7] = {0};
    int numberOfNoteTypes = 7;
    int amountStillToDistribute;
    int noteTypeIndex = 0;

    printf("Digite o valor do saque: ");
    scanf("%d", &withdrawalRequestedAmount);
    amountStillToDistribute = withdrawalRequestedAmount;

    printf("Para um saque de %d, as notas sao:\n", withdrawalRequestedAmount);

    do {
        int currentNoteDenomination = availableNoteValues[noteTypeIndex];

        calculatedNumberOfNotes[noteTypeIndex] =
            amountStillToDistribute / currentNoteDenomination;

        amountStillToDistribute = amountStillToDistribute % currentNoteDenomination;

        if (calculatedNumberOfNotes[noteTypeIndex] > 0) {
            printf("%d nota(s) de %d\n", calculatedNumberOfNotes[noteTypeIndex],
                   currentNoteDenomination);
        }
        noteTypeIndex++;
    } while (noteTypeIndex < numberOfNoteTypes);
    return 0;
}
```

### Exercício 14 - Pesquisa Pessoas (./do_while/14_Pesquisa_Pessoas.c)

```c
#include <stdio.h>

int main() {
    int totalPeopleToRead = 6;
    char personSexInput;
    char personEyeColorInput;
    int personAgeInput;

    int greenEyesTotalCount = 0;
    int brownEyesTotalCount = 0;
    int blueEyesTotalCount = 0;
    int femaleGreenEyesCount = 0;
    int maleBlueEyesCount = 0;
    int femaleBrownEyesCount = 0;
    int femaleTotalCount = 0;
    int personIndex = 0;

    do {
        printf("Dados da pessoa %d:\n", personIndex + 1);

        printf("Sexo (f/m): ");
        scanf(" %c", &personSexInput);

        printf("Cor dos olhos (v-verdes, c-castanhos, a-azuis): ");
        scanf(" %c", &personEyeColorInput);

        printf("Idade: ");
        scanf("%d", &personAgeInput);

        if (personEyeColorInput == 'v') {
            greenEyesTotalCount++;
        } else if (personEyeColorInput == 'c') {
            brownEyesTotalCount++;
        } else if (personEyeColorInput == 'a') {
            blueEyesTotalCount++;
        }

        if (personSexInput == 'f') {
            femaleTotalCount++;
            if (personEyeColorInput == 'v') {
                femaleGreenEyesCount++;
            } else if (personEyeColorInput == 'c') {
                femaleBrownEyesCount++;
            }
        } else if (personSexInput == 'm') {
            if (personEyeColorInput == 'a') {
                maleBlueEyesCount++;
            }
        }
        personIndex++;
    } while (personIndex < totalPeopleToRead);

    printf("\nResultados da analise:\n");
    printf("a. Quantidade de pessoas com olhos verdes: %d\n", greenEyesTotalCount);
    printf("b. Quantidade de pessoas com olhos castanhos: %d\n", brownEyesTotalCount);
    printf("c. Quantidade de pessoas com olhos azuis: %d\n", blueEyesTotalCount);
    printf("d. Quantidade de pessoas do sexo feminino com cor de olhos verdes: %d\n",
           femaleGreenEyesCount);
    printf("e. Quantidade de pessoas do sexo masculino com cor de olhos azuis: %d\n",
           maleBlueEyesCount);

    if (femaleTotalCount > 0) {
        double percentageFemaleBrownEyes =
            (double)femaleBrownEyesCount / femaleTotalCount * 100.0;
        printf("f. Porcentagem de pessoas do sexo feminino com cor de olhos castanhos: %.2f%%\n",
               percentageFemaleBrownEyes);
    } else {
        printf("f. Porcentagem de pessoas do sexo feminino com cor de olhos castanhos: N/A "
               "(nenhuma pessoa do sexo feminino informada)\n");
    }
    return 0;
}
```

### Exercício 15 - Autenticação Senha (./do_while/15_Autenticacao_Senha.c)

```c
#include <stdio.h>
#include <string.h>

int main() {
    int correctPassword = 123456;
    int enteredPassword;
    int maximumAllowedAttempts = 3;
    int accessGrantedFlag = 0;
    int attemptCounter = 1;

    printf("Digite a senha numerica de 6 digitos.\n");

    do {
        printf("Tentativa %d de %d: ", attemptCounter, maximumAllowedAttempts);
        scanf("%d", &enteredPassword);

        if (enteredPassword == correctPassword) {
            printf("acesso permitido\n");
            accessGrantedFlag = 1;
            break;
        } else if (attemptCounter < maximumAllowedAttempts) {
            printf("Senha incorreta. Tente novamente.\n");
        }
        attemptCounter++;
    } while (attemptCounter <= maximumAllowedAttempts);

    if (accessGrantedFlag == 0)
        printf("acesso negado\n");
    return 0;
}
```