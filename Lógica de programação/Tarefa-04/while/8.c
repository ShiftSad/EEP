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