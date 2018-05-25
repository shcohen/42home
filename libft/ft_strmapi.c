/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strmapi.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/25 21:09:08 by shcohen           #+#    #+#             */
/*   Updated: 2018/05/25 21:15:45 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strmapi(const char *str, char (*f)(unsigned int, char))
{
	unsigned int	i;
	char			*pstr;
	unsigned int	len;

	i = 0;
	len = ft_strlen(((char*)str));
	pstr = malloc(sizeof(char*) * len);
	if (!pstr)
		return (NULL);
	while (str[i])
	{
		pstr[i] = (*f)(i, str[i]);
		i++;
	}
	return (pstr);
}
