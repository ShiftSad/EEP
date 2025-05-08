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
