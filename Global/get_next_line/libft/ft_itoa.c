/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_itoa.c                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/06/05 19:17:21 by shcohen           #+#    #+#             */
/*   Updated: 2018/06/07 16:23:57 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_itoa(int nb)
{
	char	*str;
	int		len;
	int		tmp;
	int		neg;

	len = 2;
	neg = 1;
	if (nb >= 0 && len-- && !(neg = 0))
		nb *= -1;
	tmp = nb;
	while (tmp < -9 && ++len)
		tmp /= 10;
	if (!(str = (char*)malloc(sizeof(char) * (len + 1))))
		return (NULL);
	str[len] = '\0';
	while (len)
	{
		len--;
		str[len] = -(nb % 10) + '0';
		nb /= 10;
	}
	if (neg == 1)
		str[len] = '-';
	return (str);
}
