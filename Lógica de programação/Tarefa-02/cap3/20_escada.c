#include <stdio.h>

int main() {
    float angle, distance;

    printf("Digite o ângulo: ");
    scanf("%f", &angle);
    printf("Digite a distância: ");
    scanf("%f", &distance);

    printf("Altura: %.2f\n", distance * sin(angle));
}