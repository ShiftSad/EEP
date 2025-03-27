#include <stdio.h>

int main() {
    float weight;

    printf("Digite o peso: ");
    scanf("%f", &weight);

    printf("Peso em gramas: %.2f\n", weight * 1000);
}