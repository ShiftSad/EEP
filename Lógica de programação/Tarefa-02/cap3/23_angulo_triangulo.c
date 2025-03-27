#include <stdio.h>

int main() {
    float angle1, angle2;

    printf("Digite o primeiro ângulo: ");
    scanf("%f", &angle1);
    printf("Digite o segundo ângulo: ");
    scanf("%f", &angle2);

    float angle3 = 180 - angle1 - angle2;
    printf("Terceiro ângulo: %.2f\n", angle3);
}