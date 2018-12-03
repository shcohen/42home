/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strmapi.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/25 21:09:08 by shcohen           #+#    #+#             */
/*   Updated: 2018/06/12 16:33:58 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strmapi(const char *str, char (*f)(unsigned int, char))
{
	unsigned int	i;
	char			*pstr;
	unsigned int	len;

	i = 0;
	if (str)
		len = ft_strlen(str);
	if (!str || !(pstr = malloc(sizeof(char) * (len + 1))))
		return (NULL);
	while (str[i])
	{
		pstr[i] = (*f)(i, str[i]);
		i++;
	}
	pstr[i] = '\0';
	return (pstr);
}
