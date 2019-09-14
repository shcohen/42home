/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strrchr.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/23 19:44:32 by shcohen           #+#    #+#             */
/*   Updated: 2018/05/23 20:12:48 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strrchr(const char *str, int c)
{
	char	*pstr;
	int		len;

	pstr = ((char *)str);
	len = ft_strlen(((char*)str));
	while (len >= 0)
	{
		if (pstr[len] == ((char)c))
			return (&pstr[len]);
		len--;
	}
	return (NULL);
}
