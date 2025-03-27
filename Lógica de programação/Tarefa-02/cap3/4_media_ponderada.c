#include <stdio.h>
 
int main() {
    float n1, n2;

    printf("Digite a primeira nota: ");
    scanf("%f", &n1);
    printf("Digite a segunda nota: ");
    scanf("%f", &n2);

    printf("Média ponderada: %.2f\n", (n1 * 2 + n2 * 3) / 5);
}