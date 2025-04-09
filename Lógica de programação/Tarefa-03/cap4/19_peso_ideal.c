#include <stdio.h>

int main() {
    float altura, pesoIdeal;
    char sexo;

    printf("Digite seu sexo (M/F): ");
    scanf(" %c", &sexo);
    printf("Digite sua altura (em metros): ");
    scanf("%f", &altura);

    if (sexo == 'M' || sexo == 'm') {
        pesoIdeal = 72.7 * altura - 58;
        printf("Seu peso ideal e: %.2f kg\n", pesoIdeal);
    } else if (sexo == 'F' || sexo == 'f') {
        pesoIdeal = 62.1 * altura - 44.7;
        printf("Seu peso ideal e: %.2f kg\n", pesoIdeal);
    } else {
        printf("Sexo invalido.\n");
    }
}