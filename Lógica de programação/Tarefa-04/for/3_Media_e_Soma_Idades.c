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